@extends('layouts.admin')

@section('content')
<style>
.apiTable td, .apiTable th{
    word-break:break-all;
}

</style>
    <div class="jumbotron text-center">
        <h1>MG-API</h1>
        <sub>Login to access API resources </sub>
    </div>
    <div class="container apiTable">
        <table class="table-bordered" width="100%">
            <thead>
                <tr>
                    <th width="20%">Endpoints</th>
                    <th width="5%">Request Type</th>
                    <th width="15%">Request Body</th>
                    <th width="45%">Request Return Examples</th>
                </tr>
            </thead>
            <tbody>
                
                <!-- Authentication -->
                <tr>
                    <td>/auth/register</td>
                    <td>POST</td>
                    <td>(insert IC, email and password in request body)</td>
                    <td>{
                            "status": true,
                            "message": "User created successfully",
                            "data": {
                                "ic": "1000",
                                "email": "sparta@rome.com",
                                "password": "$2y$10$S6u97.uIxnoRPECTpvKLgefkEz6SDCfFKxxNWx0XfpQ7Z46vDlk6y",
                                "user_type": "user",
                                "status": "passive",
                                "updated_at": "2017-08-10 16:32:44",
                                "created_at": "2017-08-10 16:32:44",
                                "id": 4
                            }
                        }               
                    </td>
                </tr>
                <tr>
                    <td>/auth/login</td>
                    <td>POST</td>
                    <td>(insert IC and password in request body)</td>
                    <td>{
                            "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQsImlzcyI6Imh0dHA6Ly9tZ2FwaS5kZXYvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE1MDIzODI3OTEsImV4cCI6MTUwMzU5MjM5MSwibmJmIjoxNTAyMzgyNzkxLCJqdGkiOiI3Q2Q3bzJQTHd5TVluRHdjIn0.JsM1B5vDJL7BJ9xj1TnD4ofS8DndvbjYU6xy6kzHito"
                        }
                    </td>
                </tr>

                <!-- Placements -->
                <tr>
                    <td>/placements/total</td>
                    <td>GET</td>
                    <td>-</td>
                    <td>[0]</td>
                </tr>

                <!-- Cycles -->
                <tr>
                    <td>/cycles/total</td>
                    <td>GET</td>
                    <td>-</td>
                    <td>[20]</td>
                </tr>

                <!-- Users -->
                <tr>
                    <td>/users/{ic}/status</td>
                    <td>GET</td>
                    <td>/users/1000/status</td>
                    <td>["passive"]</td>
                </tr>
                <tr>
                    <td>/users/{ic}/upline</td>
                    <td>GET</td>
                    <td>/users/1000/upline</td>
                    <td>[90101056310]</td>
                </tr>

                <!-- Payout Requests -->
                <tr>
                    <td>/payoutrequest/users/{ic}</td>
                    <td>GET</td>
                    <td>/payoutrequest/users/1000</td>
                    <td>[{"id":1,"user_ic":"1000","approved":1,"payout_status":"approved","user_status":"active","updated_at":null,"created_at":"2017-08-02 01:22:39","amount":"100.00"}] (returns all requests made by this user)</td>
                </tr>

                <!-- Downlines -->
                <tr>
                    <td>/downlines/user/{ic}</td>
                    <td>GET</td>
                    <td>/downlines/user/1000</td>
                    <td>[{"id":1,"parent_user_ic":"1000","referred_user_ic":"900118145627"}] (returns all downline users under this user)</td>
                </tr>
                
                <!-- Wallet -->
                <tr>
                    <td>/wallet/{ic}/amount</td>
                    <td>GET</td>
                    <td>/wallet/1000/amount></td>
                    <td>["500.00"]</td>
                </tr>
                
                <!-- Commissions -->
                <tr>
                    <td>/commissions/{ic}/upline</td>
                    <td>GET</td>
                    <td>/commissions/1000/upline</td>
                    <td>["25.00"] or [null] (if no upline)</td>
                </tr>
                <tr>
                    <td>/commissions/{ic}/downlines</td>
                    <td>GET</td>
                    <td>/commissions/1000/downlines</td>
                    <td>[{"username":"xxx","email":"tzeweiwee@gmail.com","amount":"25.00"}] or [] (if no downlines)</td>
                </tr>

                <!-- Credit -->
                <!-- <tr>
                    <td>/credit/{ic}/placements</td>
                    <td></td>
                    <td>/credit/{ic}/placements</td>
                    <td></td>
                </tr> -->
            </tbody>
        </table>
        <h3>...more to complete</h3>
    </div>
@endsection