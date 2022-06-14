@extends('admin.master', ['title' => __('Add Item')])

@section('content')
    @include('admin.layout.topHeader', [
        'title' => __('Ajouter un article d\'épicerie') ,
        'headerData' => __('Article d\'épicerie ') ,
        'url' => 'GroceryItem' ,
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card form-card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Ajouter un article d\'épicerie') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('GroceryItem') }}" class="btn btn-sm btn-primary">{{ __('retour à la liste') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{url('GroceryItem')}}" class="grocery-item"  autocomplete="off" enctype="multipart/form-data" >
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('DÉTAIL DE L\'ARTICLE') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('nom_article') }}</label>
                                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('nom_article') }}" value="{{ old('name') }}" required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('shop_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-shop_id">{{ __("Boutique d'articles") }}</label>
                                            <select name="shop_id" id="input-shop_id" class="form-control form-control-alternative{{ $errors->has('shop_id') ? ' is-invalid' : '' }}"required>
                                                <option value="">Selectionnez la boutique</option>
                                                @foreach ($shop as $item)
                                                <option value="{{$item->id}}" {{ old('shop_id')==$item->id ? 'Selected' : ''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('shop_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('shop_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('fake_price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-fake_price">{{ __('Prix') }}</label>
                                            <input type="number" min="0" name="fake_price" id="input-fake_price" class="form-control form-control-alternative{{ $errors->has('fake_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}" value="{{ old('fake_price') }}" required>
                                            @if ($errors->has('fake_price'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('fake_price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('sell_price') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-sell_price">{{ __('Prix ​​de vente') }}</label>
                                                <input type="number" min="0" name="sell_price" id="input-sell_price" class="form-control form-control-alternative{{ $errors->has('sell_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Sell Price') }}" value="{{ old('sell_price') }}" required>
                                                @if ($errors->has('sell_price'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('sell_price') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                            <textarea name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('description') }}"required>{{ old('description') }}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group{{ $errors->has('detail_desc') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-detail_desc">{{ __('Détail') }}</label>
                                            <textarea name="detail_desc" id="input-detail_desc" class="form-control form-control-alternative{{ $errors->has('detail_desc') ? ' is-invalid' : '' }}" required></textarea>
                                            @if ($errors->has('detail_desc'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('detail_desc') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-category_id">{{ __("Catégorie de l'article") }}</label>
                                            <select name="category_id" id="input-category_id" class="form-control form-control-alternative{{ $errors->has('category_id') ? ' is-invalid' : '' }}"required>
                                                <option value="">{{__('Selectionnez une  Catégories')}}</option>
                                                @foreach ($category as $item)
                                                <option value="{{$item->id}}" {{ old('category_id')==$item->id ? 'Selected' : ''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('category_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('subcategory_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-subcategory_id">{{ __("Sous-catégorie") }}</label>
                                            <select name="subcategory_id" id="input-subcategory_id" class="form-control form-control-alternative{{ $errors->has('subcategory_id') ? ' is-invalid' : '' }}"required>
                                                <option value="">Selectionnez la Sous-catégorie</option>
                                                @foreach ($subcategory as $item)
                                                <option value="{{$item->id}}" {{ old('subcategory_id')==$item->id ? 'Selected' : ''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('subcategory_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('subcategory_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-image">{{ __('Image') }}</label>
                                            <div class="custom-file">
                                                <input type="file"  accept=".png, .jpg, .jpeg, .svg" class="custom-file-input" name="image" id="image" required>
                                                <label class="custom-file-label" for="image">{{__('télécharger')}}</label>
                                            </div>
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">{{ __('Stock') }}</label>
                                            <input type="number" name="stock" id="input-stock" class="form-control form-control-alternative{{ $errors->has('stock') ? ' is-invalid' : '' }}" placeholder="{{ __('Stock') }}" value="{{ old('stock') }}" required >
                                            @if ($errors->has('stock'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('stock') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('stock_unit') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock-unit">{{ __('Unité de stock') }}</label>
                                            <select name="stock_unit" id="input-stock_unit" class="form-control form-control-alternative{{ $errors->has('stock_unit') ? ' is-invalid' : '' }}" required>
                                                <option value=""> {{__('Selectionnez l\'unité')}} </option>
                                                <option value="kg" {{ old('stock_unit') == 'kg' ? 'Selected' : ''}}> kg </option>
                                                <option value="gm" {{ old('stock_unit') == 'gm' ? 'Selected' : ''}}> gm </option>
                                                <option value="ltr" {{ old('stock_unit') == 'ltr' ? 'Selected' : ''}}> ltr </option>
                                                <option value="ml" {{ old('stock_unit') == 'ml' ? 'Selected' : ''}}> ml </option>
                                                <option value="unit" {{ old('stock_unit') == 'unit' ? 'Selected' : ''}}> unit </option>
                                            </select>
                                            @if ($errors->has('stock_unit'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> {{ $errors->first('stock_unit') }} </strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-status">{{ __('Statut') }}</label>
                                            <Select name="status" id="input-status" class="form-control form-control-alternative{{ $errors->has('status') ? ' is-invalid' : '' }}"  required>
                                                <option value="">{{__('Selectionnez une Statut')}}</option>
                                                <option value="0" {{ old('status')=="0" ? 'Selected' : ''}}>disponible</option>
                                                <option value="1" {{ old('status')=="1" ? 'Selected' : ''}}>indisponible</option>
                                            </select>

                                            @if ($errors->has('status'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('top_featured') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-top_featured">{{ __('Top en vedette') }}</label>
                                            <Select name="top_featured" id="input-top_featured" class="form-control form-control-alternative{{ $errors->has('top_featured') ? ' is-invalid' : '' }}"  required>
                                                <option value="0" {{ old('top_featured')=="0" ? 'Selected' : ''}}>faux</option>
                                                <option value="1" {{ old('top_featured')=="1" ? 'Selected' : ''}}>vrai</option>
                                            </select>

                                            @if ($errors->has('status'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group{{ $errors->has('gallery') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-gallery">{{ __('Galerie d\'images') }}</label>
                                            <div class="custom-file">
                                                <input type="file"  accept=".png, .jpg, .jpeg, .svg" class="custom-file-input" name="gallery_img[]" id="gallery" multiple>
                                                <label class="custom-file-label" for="gallery">{{__('Selectionnez le fichier')}}</label>
                                            </div>
                                            @if ($errors->has('gallery'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('gallery') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row flex">
                                <div class="col-6">
                                    <h6 class="heading-small text-muted mb-4">{{ __('DÉTAIL DE L\'UNITÉ DE L\'ARTICLE') }}</h6>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-success btn-add"> + </button>
                                </div>
                            </div>

                            <div class="pl-lg-4">
                                <div class="append">
                                    <div class="row">
                                        <div class="col-2">
                                            <label class="form-control-label"> {{__('Quantité')}} </label>
                                            <input type="number" name="qty[]" class="form-control form-control-alternative" placeholder="Quantity" required>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-control-label"> {{__('Unité')}} </label>
                                            <select name="unit[]" class="form-control form-control-alternative" required>
                                                <option value=""> Selectionnez une unité </option>
                                                <option value="kg"> kg </option>
                                                <option value="gm"> gm </option>
                                                <option value="ltr"> ltr </option>
                                                <option value="ml"> ml </option>
                                                <option value="unit"> unit </option>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-control-label"> {{__('Prix ​​réduit')}} </label>
                                            <input type="number" name="price[]" class="form-control form-control-alternative" placeholder="Price" required>
                                        </div>
                                        <div class="col-2">
                                            <label class="form-control-label"> {{__("Prix ​​d'origine")}} </label>
                                            <input type="number" name="fake_price[]" class="form-control form-control-alternative" placeholder="Fake Price" required>
                                        </div>
                                        <div class="col-2 mt-auto">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('enregistrer') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
