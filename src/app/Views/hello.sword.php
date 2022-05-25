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
                <div class="title m-b-md">
                    Toyovel
                </div>
                <h1>IndexPage</h1>
                <h2>{{$test1}}</h2>
                <h2>{{$test2}}</h2>
                <h2>{{$test3}}</h2>
                <form action="/create" method="post" class="form-example">
                    <label for="name">Enter your name: </label><br>
                    <input type="text" name="yamada" id="name" required><br>
                    <input type="text" name="toyomi" id="name" required><br>
                    <input type="hidden" value="{{ csrf_token  }}" name="_token"/>
                    <input type="hidden" value="put" name="_method"/>
                    <button type="submit">submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
