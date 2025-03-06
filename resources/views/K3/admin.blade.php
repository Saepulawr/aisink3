@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Update Data Keselamatan Kerja</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.update') }}" method="POST">
            @csrf
            @method('POST')

            <div class="grid grid-cols-2 gap-4">
                {{-- <div>
                    <label class="block text-gray-600">Tanggal:</label>
                    <input type="date" name="date" value="{{ $data->date }}" class="w-full p-2 border rounded-lg">
                </div> --}}

                <div>
                    <label class="block text-gray-600">Labour Accident:</label>
                    <input type="number" name="labour_accident" value="{{ $data->labour_accident }}"
                        class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-600">Small Accident:</label>
                    <input type="number" name="small_accident" value="{{ $data->small_accident }}"
                        class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-600">Traffic Accident:</label>
                    <input type="number" name="traffic_accident" value="{{ $data->traffic_accident }}"
                        class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-600">Near Miss:</label>
                    <input type="number" name="near_miss" value="{{ $data->near_miss }}"
                        class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-600">PAK:</label>
                    <input type="number" name="pak" value="{{ $data->pak }}" class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-600">Jumlah Pekerja:</label>
                    <input type="number" name="jumlah_pekerja" value="{{ $data->jumlah_pekerja }}"
                        class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-600">Jam Kerja Aman:</label>
                    <input type="number" name="jam_kerja_aman" value="{{ $data->jam_kerja_aman }}"
                        class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block text-gray-600">Hari Kerja Aman:</label>
                    <input type="number" name="hari_kerja_aman" value="{{ $data->hari_kerja_aman }}"
                        class="w-full p-2 border rounded-lg">
                </div>

                <div class="col-span-2">
                    <label class="block text-gray-600">Running Text:</label>
                    <input type="text" name="running_text" value="{{ $data->running_text }}"
                        class="w-full p-2 border rounded-lg">
                </div>
            </div>

            <button type="submit"
                class="mt-4 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Update Data
            </button>
        </form>
    </div>
@endsection
