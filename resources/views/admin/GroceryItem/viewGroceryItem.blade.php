@extends('admin.master', ['title' => __('Article d\'épicerie')])

@section('content')
    @include('admin.layout.topHeader', [
        'title' => __('Article d\'épicerie') ,
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col">
                <div class="card form-card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Article d\'épicerie') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{url('GroceryItem/create')}}" class="btn btn-sm btn-primary">{{ __('Ajouter un article d\'épicerie') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if(count($items)>0)
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{{ __('#') }}</th>
                                        <th scope="col">{{ __('Image') }}</th>
                                        <th scope="col">{{ __('Nom_article') }}</th>
                                        <th scope="col">{{ __('Catégoeis') }}</th>
                                        <th scope="col">{{ __('Boutique') }}</th>
                                        <th scope="col">{{ __('Prix') }}</th>
                                        <th scope="col">{{ __('Statut') }}</th>
                                        <th scope="col">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img class=" avatar-lg rou  nd-5" src="{{url('images/upload/'.$item->image)}}"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->category->name }}</td>
                                            <td>{{ $item->shopName }}</td>
                                            <td><strike>{{$currency.$item->fake_price}}</strike>{{ $currency.$item->sell_price }}</td>

                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="{{$item->status==0?'bg-success': 'bg-danger'}}"></i>
                                                    <span class="status">{{$item->status==0?'Avaliable': 'Not avaliable'}}</span>
                                                </span>
                                            </td>
                                            <td>
                                                
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-men
                                                    u-right dropdown-menu-arrow">
                                                        {{-- <a class="dropdown-item" href="{{url('GroceryItem/'.$item->id)}}">{{ __('View Item') }}</a> --}}
                                                        <a class="dropdown-item" href="{{url('GroceryItem/'.$item->id.'/edit')}}">{{ __('modifier') }}</a>
                                                        <a class="dropdown-item" href="{{url('GroceryItem/gallery/'.$item->id.'/edit')}}">{{ __('image') }}</a>
                                                        <a class="dropdown-item" onclick="deleteData('GroceryItem','{{$item->id}}');" href="#">{{ __('supprimer') }}</a>
                                                        {{-- onclick="deleteData('Item','{{$item->id}}');" --}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <?php echo $items->render(); ?>
                        @else
                            <div class="empty-state text-center pb-3">
                                <img src="{{url('images/empty3.png')}}" style="width:35%;height:220px;">
                                <h2 class="pt-3 mb-0" style="font-size:25px;">{{__('Rien!!')}}</h2>
                                <p style="font-weight:600;">{{__('votre collection est vide....')}}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
