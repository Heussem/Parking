<x-app-layout>

    <div class="flex flex-row justify-center mt-20">

        <div class="">

 <div class="block max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
  <form action="{{route ('reservation.update', $reservation->id)}}" method="post">
    @method('PUT')
    @csrf
    <div class="flex justify-center gap-4">

      <div class="relative mb-6" data-te-input-wrapper-init>
        <input
          type="text"
          name="user"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="utilisateur" />
      </div>

      <div class="relative mb-6" data-te-input-wrapper-init>
        <input
          type="text"
          name="place"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="place" />
      </div>

    </div>

    <div class="flex justify-center gap-4">

      <div class="relative mb-6" data-te-input-wrapper-init>
        <input
          type="text"
          name="date_debut"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="date debut" />
      </div>
  
      <div class="relative mb-6" data-te-input-wrapper-init>
        <input
          type="text"
          name="date_fin"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="date fin" />
      </div>

    </div>

    

    <div class="flex justify-center">
        <button 
            class="flex bg-black hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-full justify-center"
            type="submit"
            data-te-ripple-init
            data-te-ripple-color="light">
            Creer une reservation
        </button>
      </div>
  </form>
</div>

</x-app-layout>