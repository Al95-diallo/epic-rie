@extends('admin.master', ['title' => __('Ajouter une catégorie')])

@section('content')
    @include('admin.layout.topHeader', [
        'title' => __('Ajouter une catégorie d\'épicerie') ,
        'headerData' => __('catégorie d\'épicerie') ,
        'url' => 'GroceryCategory' ,
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">

            <div class="row">
                    <div class="col-xl-12 order-xl-1">
                        <div class="card form-card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">{{ __('Ajouter une catégorie d\'épicerie') }}</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="{{ url('GroceryCategory') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{url('GroceryCategory')}}" autocomplete="off" enctype="multipart/form-data" >
                                    @csrf

                                    <h6 class="heading-small text-muted mb-4">{{ __('DÉTAIL DE LA CATÉGORIE D\'ÉPICERIE') }}</h6>
                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">

                                            <label class="form-control-label" for="input-name">{{ __('nom_catégorie') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-image">{{ __('Image') }}</label>
                                                <div class="custom-file">
                                                    <input type="file"  accept=".png, .jpg, .jpeg, .svg" class="custom-file-input" name="image" id="image" required>
                                                    <label class="custom-file-label" for="image">Selectiionnez l_image</label>
                                                </div>
                                                @if ($errors->has('image'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-status">{{ __('Statut') }}</label>
                                            <Select name="status" id="input-status" class="form-control form-control-alternative{{ $errors->has('status') ? ' is-invalid' : '' }}"  required>
                                                <option value="">Selectioinnez le  Statut</option>
                                                <option value="0" {{ old('status')=="0" ? 'Selected' : ''}}>disponible</option>
                                                <option value="1" {{ old('status')=="1" ? 'Selected' : ''}}>Non disponible</option>
                                            </select>

                                            @if ($errors->has('status'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
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
