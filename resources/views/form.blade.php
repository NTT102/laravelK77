@if ($errors->any())
<h1 style="color: red"> {{ $errors->first() }}</h1>    
@endif

<form action="/form?name=php" method="POST">
        @csrf
    <input type="text" name="title">
    <br>
    <textarea name="content" id="" cols="30" rows="10">

    </textarea>
    <select name="city" id="">
        <option value="hn"> Ha Noi</option>
        <option value="sg"> Ho Chi Minh</option>
    </select>
    <br>
    <label for="inputCheckbox">
        <input type="checkbox" name="class_php" value=""> PHP
    </label>
    <label for="inputCheckbox">
        <input type="checkbox" name="class_laravel" value="laravel"> laravel
    </label>
    <br>
    <label for="inputradio">
        <input type="radio" name="gender" value="nam"> nam
    </label>
    <label for="inputradio">
        <input type="radio" name="gender" value="nu"> nu
    </label>
    <br>
    <input type="submit" name="Submit">
    
    
</form>