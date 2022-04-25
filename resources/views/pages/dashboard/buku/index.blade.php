<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Buku') }}
    </h2>
  </x-slot>

  <x-slot name="script">
    <script>
      //DataTable

      var datatable = $('#bukuTable').DataTable({
        ajax: {
            url: '{!! url()->current() !!}'
                },
                columns: [
                    { data: 'id', name: 'id', width:'10%' },
                    { data: 'judul', name: 'judul' },
                    { data: 'pengarang', name: 'pengarang'},
                    { data: 'penerbit', name: 'penerbit' },
                    { data: 'tahun_terbit', name: 'tahun_terbit' },
                    { data: 'stock', name: 'stock' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    }
                    
                ]
      })
    </script>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class=" mb-10">
        <a href="{{ route('dashboard.buku.create') }}"
          class="bg-blue-300 hover:bg-blue-500 text-white font-bold py-3 px-6  shadow-md">Input Buku</a>
      </div>
      <div class="shadow overflow-hidden sm-rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <table id="bukuTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>