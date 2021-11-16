<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table td{
            padding: 3px;
        }
        h4{
            margin-top: 8px;
            margin-bottom: 6px;
        }
    </style>
</head>
<body>
    <div style="background: green; color:white;">
        <h3 align="center" style="padding: 10px">Registration Form</h3>
    </div>
    <div>
        <div>
            <div align="center">
                <img src="{{public_path('image/form/image/'. $form->image)}}" alt="" height="150" width="150">
            </div>
            
            <h4>Academic Info.</h4>
            <div>
                <table class="striped">
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{$student->name}}</td>
                    </tr>
                    <tr>
                        <td>Registration No.</td>
                        <td>:</td>
                        <td>{{$student->id}}</td>
                    </tr>
                    
                    <tr>
                        <td>Department</td>
                        <td>:</td>
                        <td>{{$student->department->name}}</td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>{{$student->semester->name}}</td>
                    </tr>
                    <tr>
                        <td>Session</td>
                        <td>:</td>
                        <td>{{$student->session}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>{{$student->address}}</td>
                    </tr>
                    <tr>
                        <td>Current Address</td>
                        <td>:</td>
                        <td>{{$student->current_address}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>{{$student->phone}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>