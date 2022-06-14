@extends('admin.master', ['title' => __('Ajouter une boutique ')])

@section('content')
    @include('admin.layout.topHeader', [
        'title' => __('Ajouter une boutique ') ,
        'headerData' => __('épicerie') ,
        'url' => 'GroceryShop' ,
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">

            <div class="row">
                    <div class="col-xl-12 order-xl-1">
                        <div class="card form-card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">{{ __('Ajouter une épicerie') }}</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{ url('GroceryShop') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{url('GroceryShop')}}" autocomplete="off" enctype="multipart/form-data" >
                                    @csrf

                                    <h6 class="heading-small text-muted mb-4">{{ __('DÉTAIL DE LA BOUTIQUE') }}</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-name">{{ __('Nom de la boutique') }}</label>
                                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Shop Name') }}" value="{{ old('name') }}" required autofocus>
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                    <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                                        <label class="form-control-label" for="input-address">{{ __('Adresse de la boutique') }}</label>
                                                        <input type="text" name="address" id="input-address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Shop Address') }}" value="{{ old('address') }}" required >
                                                        @if ($errors->has('address'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-description">{{ __('Description') }}</label>
                                                    <textarea name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" required >{{ old('description') }}</textarea>
                                                    @if ($errors->has('description'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('latitude') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-latitude">{{ __('Latitude') }}</label>
                                                    <input type="text" name="latitude" id="input-latitude" class="form-control form-control-alternative{{ $errors->has('latitude') ? ' is-invalid' : '' }}" placeholder="{{ __('Latitude') }}" value="{{ old('latitude') }}" required >
                                                    @if ($errors->has('latitude'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('latitude') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('longitude') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-longitude">{{ __('Longitude') }}</label>
                                                    <input type="text" name="longitude" id="input-longitude" class="form-control form-control-alternative{{ $errors->has('longitude') ? ' is-invalid' : '' }}" placeholder="{{ __('Longitude') }}" value="{{ old('longitude') }}" required >
                                                    @if ($errors->has('longitude'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('longitude') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-location">{{ __('Emplacement') }}</label>
                                                    <select name="location" id="input-location" class="form-control form-control-alternative{{ $errors->has('location') ? ' is-invalid' : '' }}"  required>
                                                        <option value="">Selectionnez l'emplacement</option>
                                                        @foreach ($location as $item)
                                                        <option value="{{$item->id}}" {{ old('location')==$item->id ? 'Selected' : ''}}>{{$item->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('location'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('location') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-phone">{{ __('Téléphone') }}</label>
                                                    <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" required >
                                                    @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-category_id">{{ __('Catégorie') }}</label>
                                                    <Select name="category_id[]" id="input-category_id" multiple="multiple" class="form-control select2 select2-multiple form-control-alternative{{ $errors->has('category_id') ? ' is-invalid' : '' }}"  required>
                                                        <option value="">{{__('Selectionnez une catégorie')}}</option>
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
                                                <div class="form-group{{ $errors->has('radius') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-radius">{{ __('Rayon de la boutique') }}</label>
                                                    <input type="number" name="radius" min="0" id="input-radius" class="form-control form-control-alternative{{ $errors->has('radius') ? ' is-invalid' : '' }}" placeholder="{{ __('Shop Radius') }}" value="{{ old('radius') }}" required >
                                                    @if ($errors->has('radius'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('radius') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-status">{{ __('Statut') }}</label>
                                                    <Select name="status" id="input-status" class="form-control form-control-alternative{{ $errors->has('status') ? ' is-invalid' : '' }}"  required>
                                                        <option value="">Selectionnez le Statut</option>
                                                        <option value="0" {{ old('status')=="0" ? 'Selected' : ''}}>Activé</option>
                                                        <option value="1" {{ old('status')=="1" ? 'Selected' : ''}}>Désactive</option>
                                                    </select>

                                                    @if ($errors->has('status'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('open_time') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-open_time">{{ __('Heure d\'ouverture') }}</label>
                                                    <input type="time" name="open_time" id="input-open_time" class="form-control form-control-alternative{{ $errors->has('open_time') ? ' is-invalid' : '' }}" placeholder="{{ __('Open Time') }}" value="{{ old('open_time') }}" >
                                                    @if ($errors->has('open_time'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('open_time') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('close_time') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-close_time">{{ __('La période de fermeture') }}</label>
                                                    <input type="time" name="close_time" id="input-close_time" class="form-control form-control-alternative{{ $errors->has('close_time') ? ' is-invalid' : '' }}" placeholder="{{ __('Close Time ') }}" value="{{ old('close_time') }}" >
                                                    @if ($errors->has('close_time'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('close_time') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-image">{{ __('Logo de la boutique') }}</label>
                                                    <div class="custom-file">
                                                        <input type="file"  accept=".png, .jpg, .jpeg, .svg" class="custom-file-input" name="image" id="image">
                                                        <label class="custom-file-label" for="image">{{__('choisir l\'image')}}</label>
                                                    </div>
                                                    @if ($errors->has('image'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('image') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group{{ $errors->has('cover_image') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-cover_image">{{ __('Image de couverture') }}</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="cover_image" id="cover_image">
                                                        <label class="custom-file-label" for="cover_image">{{__('choisir l\'image')}}</label>
                                                    </div>
                                                    @if ($errors->has('cover_image'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('cover_image') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('enregistrer') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

    </div>

@endsection
