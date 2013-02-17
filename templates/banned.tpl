<html>
<head>
    <meta content="text/html; charset={charset}" http-equiv=Content-Type>
    <style>
        body {
            font-family: Verdana, Tahoma, Arial, Trebuchet MS, Sans-Serif, Georgia, Courier, Times New Roman, Serif;
            font-size: 11px;
            margin: 0;
            padding: 0; /* required for Opera to have 0 margin */
        }

        .errorwrap {
            background: #F2DDDD;
            border: 1px solid #992A2A;
            border-top: 0;
            margin: 5px;
            padding: 0;
        }

        .errorwrap h4 {
            background: #E3C0C0;
            border: 1px solid #992A2A;
            border-left: 0;
            border-right: 0;
            color: #992A2A;
            font-size: 12px;
            font-weight: bold;
            margin: 0;
            padding: 5px;
        }

        .errorwrap p {
            background: transparent;
            border: 0;
            color: #992A2A;
            margin: 0;
            padding: 8px;
            font-size: 11px;
        }
    </style>
    <title>账户已被禁止</title>
</head>
<body>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
<table border="0" width="600" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td width="100%">
            <div class="errorwrap">
                <h4>你的账户已被禁止:</h4>

                <p>你的账户已被禁止原因如下:</p>

                <p>{description}</p>

                <p>解禁期限: {end}</p>

                <p>超过解禁期限，系统将自动删除你的帐号.</p>
            </div>
        </td>
    </tr>
</table>

</body>
</html>