<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<x-app-layout>
<div class="mx-16 py-24 bg-white">

        <div class=" flex flex-col items-center" >
            <img style="width:120px"src="image/erreur.svg" alt="erreur"> </img>
            <h1 class="pb-3 mt-8 text-2xl font-extrabold">Compte non Admin </h1>
            <p>Votre compte n'a pas le statut admin vous ne pouvez pas accéder a cette page,</br> vous pouvez cependant appuyer sur le bouton ci-dessous pour retourner a votre espace</p>
            <button class="mt-8 py-3 px-5 bg-black rounded-full"><a href="/home" class="text-white">Mes reservations</a></button>
        </div>
</div>

</x-app-layout>
</body>
</html>
