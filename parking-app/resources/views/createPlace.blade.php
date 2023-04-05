<x-app-layout>

    <div class="flex flex-row justify-center mt-20">

        <div class="">

 <div class="block max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
  <form action="{{route ('place.store')}}" method="POST">
    @csrf
    <div class="flex justify-center gap-4">

      <div class="relative mb-6" data-te-input-wrapper-init>
        <input
          type="text"
          name="numero"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="numero" />
      </div>

    </div>

    <div class="flex justify-center">
        <button 
            class="flex bg-black hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-full justify-center"
            type="submit"
            data-te-ripple-init
            data-te-ripple-color="light">
            Creer place
        </button>
      </div>
  </form>
</div>

</x-app-layout>