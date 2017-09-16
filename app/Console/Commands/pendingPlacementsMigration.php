<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\PendingPlacements;
use App\Placement;
use Validator;
use Carbon\Carbon;

class pendingPlacementsMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:migratePlacements';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Moves pending placements to Placements table when the placement has reached at 30 min waiting time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dtNow = Carbon::now('Asia/Kuala_Lumpur')->subMinutes(30);
        $pendingPlacements = PendingPlacements::where('created_at', '<=', $dtNow->toDateTimeString())->get();
        foreach($pendingPlacements as $placement){
            $dt = ($placement->created_at)->subHours(8); //converts to UTC time
            $dtNow = Carbon::now('UTC');
            echo $placement->id;
            if($dtNow->diffInMinutes($dt) > 29){
                $data = array(
                    "user_ic" => $placement->user_ic,
                    "created_at" => $placement->created_at,
                    "status" => "active"
                );
                $this->createPlacement($data);
                $this->deletePendingPlacement($placement->id);
            }

        }
    }

    private function createPlacement($data){
        try{                            
            $newData = new Placement($data);
            $newData->save(); 
        }catch(QueryException $e){
            echo $e;
        }
    }

    private function deletePendingPlacement($id){
        try{
            $record = PendingPlacements::find($id);
            $record->delete();
        }catch(QueryException $e){
            return json_encode(array("error" => $e));
        }
    }
}
