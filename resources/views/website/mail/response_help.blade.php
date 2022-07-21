

<body style="background-color:grey">
<table align="center" border="0" cellpadding="0" cellspacing="0"
       width="550" bgcolor="white" style="border:2px solid black">
    <tbody>
    <tr>
        <td align="center">
            <table align="center" border="0" cellpadding="0"
                   cellspacing="0" class="col-550" width="550">
                <tbody>
                <tr>
                    @if($details['id']=="deny_help" )
                    <td align="center" style="background-color: #c9302c;
										height: 50px;">


                        <a href="#" style="text-decoration: none;">




                            <p style="color:white;
												font-weight:bold;">
                                Bright Of Hope
                            </p>


                        </a>
                    </td>
                    @else
                        <td align="center" style="background-color: #4cb96b;
										height: 50px;">


                            <a href="#" style="text-decoration: none;">




                                <p style="color:white;
												font-weight:bold;">
                                    Bright Of Hope
                                </p>


                            </a>
                        </td>
                    @endif
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr style="height: 300px;">
        <td align="center" style="border: none;
						border-bottom: 2px solid #4cb96b;
						padding-right: 20px;padding-left:20px">

            <p style="font-weight: bolder;font-size: 42px;
							letter-spacing: 0.025em;
							color:black;">
                {{   $details['body']  }}
                <br>
            @if($details['id']=="deny_help" )
            <p style="color:#c9302c; font-size: 30px;">{{ $details['type']}}</p>
            @else
            <p style="color:#4cb96b; font-size: 30px;">{{ $details['type']}}</p>
            @endif
            </p>
        </td>

    </tr>


    <tr style="display: inline-block;">
        <td style="height: 150px;
						padding: 20px;
						border: none;
						border-bottom: 2px solid #361B0E;
						background-color: white;">
            <p class="data"
               style="text-align: center;
							align-items: center;
							font-size: 15px;
							padding-bottom: 12px;">
                {{   $details['thanks']  }}
            </p>


            <h3 style="text-align: center;
							align-items: center;">
                You can contact us if you think there's something wrong with the three numbers:096444111
                <br>
                or on the email :project.4tth@gmail.com
            </h3>

        </td>
    </tr>
    </tbody>
</table>
</body>

