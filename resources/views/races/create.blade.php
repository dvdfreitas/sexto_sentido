<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  
<h1 class="text-4xl">Criação de corrida</h1>

<form action="/races/store" method="POST">
    @csrf
    
    <x-forms.input_text name="name">Nome</x-forms.input_text>
    <x-forms.input_text name="location">Localização</x-forms.input_text>
    
    <label>Local</label>
    <input name="location">
    
    Data:
    <input name="date" type="date">
    <button type="submit">Criar</button>
</form>

</body>
</html>

