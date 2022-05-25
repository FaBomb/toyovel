<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Toyovel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h1>Toyovel</h1>
                <h2>IndexPage</h2>
                <form action="/create" method="post" class="form-example">
                    <label for="name">Enter your name: </label><br>
                    <label for="name">name: </label>
                    <input type="text" name="name" required><br>
                    <label for="name">birthday: </label>
                    <input type="text" name="birthday" required><br>
                    <label for="name">sex: </label>
                    <input type="text" name="sex" required><br>

                    <input type="hidden" value="{{ csrf_token  }}" name="_token"/>
                    <input type="hidden" value="put" name="_method"/>

                    <button type="submit">submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
