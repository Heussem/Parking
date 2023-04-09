<x-app-layout>

    <div class="flex flex-row justify-center mt-20">

        <div class="">

 <div class="block max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700">
  <form action="{{route ('place.update', $place[0]->id)}}" method="POST">
    @method('PUT')
    @csrf
    <div class="flex flex-col flex items-center px-10 py-10">
<p class="mb-6">Veuillez modifier la place (4 caractères)</p>
      <div class="relative mb-3" data-te-input-wrapper-init>
        <input
          type="text"
          name="numero"
          id="exampleInput123"
          aria-describedby="emailHelp123"
          placeholder="" value="{{old('name',$place[0]->numero)}}" />
      </div>

    </div>

    <div class="flex justify-center">
        <button
            class="flex bg-black hover:bg-gray-700 text-white font-bold py-3 px-3 rounded-full justify-center"
            type="submit"
            data-te-ripple-init
            data-te-ripple-color="light">
            Update
        </button>
      </div>
  </form>
</div>

</x-app-layout>
