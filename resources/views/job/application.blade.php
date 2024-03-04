<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pixl8 - Job Application</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
        <div class="container text-center w-25">
            <div class="row">
                <div class="col-12 mt-3">
                    <img src="{{asset('images/logo.png')}}" alt="Logo">
                </div>
                <div class="col-12 mt-3">
                    <p>Apply job today!</p>
                </div>
                <div class="col-12">
                    <form action="{{ route('apply-job') }}" method="POST">
                        @csrf
                        <table class="table table-borderless">
                            <tr>
                                <td>Full Name </td>
                                <td><input name="full_name" type="text" required></td>
                            </tr>
                            <tr>
                                <td>Email </td>
                                <td><input name="email" type="email" required></td>
                            </tr>
                            <tr>
                                <td>Website </td>
                                <td><input name="website" type="text"></td>
                            </tr>
                            <tr>
                                <td>GitHub </td>
                                <td><input name="github" type="text"></td>
                            </tr>
                            <tr>
                                <td>Twitter </td>
                                <td><input name="twitter" type="text"></td>
                            </tr>
                            <tr>
                                <td>Linkedin </td>
                                <td><input name="linkedin" type="text"></td>
                            </tr>
                            <tr>
                                <td>Message </td>
                                <td><textarea name="message" rows="4" placeholder="Message" required></textarea></td>
                            </tr>
                            <tr>
                                <td>Test Mode </td>
                                <td style="text-align: left;">
                                    <select name="test_mode">
                                        <option value="true">True</option>
                                        <option value="false">False</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <div class="mt-3">
                            <button type="submit" class="text-white bg-danger border-0 rounded p-2">Submit</button>
                        </div>

                        @if (session('success') == true)
                            <div class="mt-3">
                                <p class="text-success text-bold">{{ session('message') }}</p>
                            </div>
                        @elseif (session('success') == false)
                            <div class="mt-3">
                                <p class="text-danger text-bold">{{ session('message') }}</p>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<style>
body {
    font-family: 'Segoe UI';  
    font-size: 12px;  
}
input, textarea {
    width: 100%;  
}
.text-left {
    text-align: left; /* Align text to the left */
}
.table td {
    padding: 0.25rem;
}
</style>
