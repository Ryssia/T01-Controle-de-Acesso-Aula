<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if(Auth::check())
                        <!-- can('criar-noticia') -->
                        <!--can('create', App\Models\Noticia::class)-->
                        <div style="margin-bottom:2%;">
                            <button type="button" class="btn btn-outline-primary">
                                <a href="{{ route('noticias.create') }}">Criar Noticia</a>
                            </button>
                        </div>
                        
                        <!-- endcan -->
                    @endif
                    <!--<ul class="list-group">-->
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Descricao</th>
                                <th scope="col">ID Usuario</th>
                                <th scope="col">Acoes</th>
                                </tr>
                            </thead>

                            <tbody>    
                                <!--foreach($noticias as $noticia)-->
                                <tr>
                                <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                                    <th scope="row"> # </th>
                                    <td> # </td>
                                    <td> # </td>
                                    <td> # </td>
                                    <td>

                                    <div style="display:flex">    
                                    @auth
                                        <!-- can('excluir-noticia', $noticia) -->
                                            <!--can('delete', $noticia)-->
                                            <div style="margin-right:2%;">
                                                <form method="post" action="#">
                                            
                                                    @csrf
                                    
                                                    <button class="btn btn-outline-danger">
                                                        Excluir
                                                    </button>
                                                </form>
                                            </div>
                                            
                                        <!-- endcan -->
                                        
                                        <!-- can('editar-noticia', $noticia) -->
                                            <!--can('update', $noticia)-->
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-success">
                                                    <a href="#">Editar</a>
                                                </button>
                                            </div>
                                            
                                        <!-- endcan -->
                                        
                                        <!-- can('visualizar-noticia', $noticia) -->
                                            <!--can('view', $noticia)-->
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-info">
                                                    <a href="#">Visualizar</a>
                                                </button>
                                            </div>
                                
                                        <!-- endcan -->

                                    @endauth
                                    </div>
                                    </td>
                                <!--</li>-->

                                </tr>
                                <!--endforeach-->
                                
                            </tbody>
                        </table>

        </div>            
    </div>
</x-app-layout>
