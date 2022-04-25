<x-app-layout>
<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-60">
      @if ($errors->any())
      <div class="mb-0">
         <div class="bg-blue-500 text-white font-bold rounded-5 px-4 py-2">
         Terdapat kesalahan!
         </div>
      </div>
      <div class="mb-8">
         <div class="border border-t-0 border-blue-400 bg-blue-100 px-4 py-3 text-blue-700">
         <p>
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
         </p>
         </div>
      </div>
      @endif

      <form action="{{ route('dashboard.member.store') }}" method="post" class="w-full" autocomplete="off">
         @csrf
         <div class="flex flex-wrap -mx-3 mb-2">
         <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="namamember">
               Nama Member
            </label>
            <input
               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
               id="namamember" name="namamember" type="text" value="{{ old('namamember') }}" placeholder="Masukkan nama lengkap">
         </div>
         </div>
         <div class="flex flex-wrap -mx-3 mb-2">
         <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="jeniskelamin">
               Jenis Kelamin
            </label>
            <select name="jeniskelamin" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
               <option value="">- Pilih jenis kelamin -</option>
               <option value="Laki-laki">Laki-laki</option>
               <option value="Perempuan">Perempuan</option>
            </select>
         </div>
         </div>
         <div class="flex flex-wrap -mx-3 mb-2">
         <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="penerbit">
               Alamat Tempat Tinggal
            </label>
            <textarea
               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
               id="alamat" name="alamat" type="text" value="{{ old('alamat') }}" placeholder="Masukkan alamat lengkap"></textarea>
         </div>
         </div>
         <div class="flex flex-wrap -mx-3 mb-2">
         <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="tahun">
               Nomor HP
            </label>
            <input
               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
               id="tahun" name="nomorhp" type="text" value="{{ old('nomorhp') }}" placeholder="Masukkan nomor hp">
         </div>
         </div>
         <div class="flex flex-wrap -mx-3 mb-6">
         <div class="flex justify-end w-full px-3">
            <button type="submit"
               class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-md">
               Simpan data
            </button>
         </div>
         </div>
      </form>
   </div>
</x-app-layout>