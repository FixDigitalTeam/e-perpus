<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Member Pepustakaan') }}
    </h2>
  </x-slot>

  <x-slot name="script">
    <script>
      //DataTable

      var datatable = $('#membertable').DataTable({
        ajax: {
            url: '{!! url()->current() !!}'
                },
                columns: [
                    { data: 'id', name: 'id', width:'10%' },
                    { data: 'nama_member', name: 'nama_member' },
                    { data: 'jenis_kelamin', name: 'jenis_kelamin'},
                    { data: 'alamat', name: 'alamat' },
                    { data: 'nomor_hp', name: 'nomor_hp' },
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
        <a href="{{ route('dashboard.member.create') }}"
          class="bg-blue-300 hover:bg-blue-500 text-white font-bold py-3 px-6  shadow-md">Input Member Baru</a>
      </div>
      <div class="shadow overflow-hidden sm-rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <table id="membertable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Member</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nomor Hp</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>