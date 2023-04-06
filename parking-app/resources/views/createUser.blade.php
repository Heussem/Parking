<x-app-layout>

    <div class="flex flex-row justify-center mt-20">



 <div class="block max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
  <form action="{{route ('user.store')}}" method="POST">
    @csrf
    <div align="center" class="flex flex-col flex items-center px-20 py-16">

        <p class="mb-5">Veuillez remplir tous les champs du formulaire :</p>
      <div class="flex justify-center" data-te-input-wrapper-init>
        <input class="pr-8 py-3 mb-5"
          type="text"
          name="name"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="name" />
      </div>

      <div class="flex justify-center" data-te-input-wrapper-init>
        <input class="pr-8 py-3 mb-5"
          type="email"
          name="email"
          id="exampleInput124"
          aria-describedby="emailHelp124"
          placeholder="email" />
      </div>



      <div class="flex justify-center" data-te-input-wrapper-init>
          <input class="pr-8 py-3"
              type="password"
              name="password"
              id="password"
              aria-describedby="password"
              placeholder="password" />
      </div>

    <div class="flex justify-center mt-6">
      <input type="checkbox" name="active" id="active" value="1" {{$user->isActive ? 'checked' : ''}}>
        <span class="pl-3">Valider le compte ?</span>
    </div>

           </div>



    <div class="flex justify-center">
        <button
            class="flex bg-black hover:bg-gray-700 text-white font-bold py-3 px-8 rounded-full justify-center"
            type="submit"
            data-te-ripple-init
            data-te-ripple-color="light">
            Sign up
        </button>
      </div>
  </form>
 </div>
        </div>
    </div>
    </div>

</x-app-layout>
