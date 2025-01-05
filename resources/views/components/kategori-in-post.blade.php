                                   <div class="*:py-6 *:px-4 *:border-b flex flex-col text-md font-medium">
                                       @foreach ($kategori as $item)
                                           <a class="hover:bg-slate-400 hover:text-white dark:hover:bg-slate-700"
                                               href="{{ buildQueryUrl('all-post', ['kategori' => $item['id_kategori']]) }}">
                                               {{ $item['nama_kategori'] }}
                                           </a>
                                       @endforeach
                                   </div>
