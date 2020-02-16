<div class="container">
    <div class="row">
        <div class="col-12">
            @isset($name)<h2 class="page-h2">{{$name}}</h2>@endisset
            {!! Form::model($data, ['action' => $action]) !!}
            @foreach($fields as $field)
                @switch($field['type'])
                    @case("hidden")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::hidden($field['name'], null, ['class' => 'form-control']) !!}
                        </div>
                    @break
                    @case("text")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::text($field['name'], null, ['class' => 'form-control']) !!}
                        </div>
                    @break
                    @case("date")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::date($field['name'], null, ['class' => 'form-control']) !!}
                        </div>
                    @break
                    @case("password")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::password($field['name'], ['class' => 'form-control']) !!}
                        </div>
                    @break
                    @case("email")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::email($field['name'], null, ['class' => 'form-control']) !!}
                        </div>
                    @break
                    @case("file")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::file($field['name'], ['class' => 'form-control-file']) !!}
                        </div>
                    @break
                    @case("textarea")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::textarea($field['name'], null, ['class' => 'form-control']) !!}
                        </div>
                    @break
                    @case("number")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::number($field['name'], null, ['class' => 'form-control']) !!}
                        </div>
                    @break
                    @case("select")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::select($field['name'], $field['options'], null, ['class' => 'form-control']) !!}
                        </div>
                    @break
                    @case("select-multiple")
                        <div class="form-group">
                            {!! Form::label($field['name'], $field['title']) !!}
                            {!! Form::select($field['name'], $field['options'], null, ['class' => 'form-control','multiple'=>'multiple']) !!}
                        </div>
                    @break
                    @case("checkbox")
                        @foreach($field['options'] as $name=>$title)
                            <div class="form-check">
                                @if($data[$field['name']]==$name)
                                    {!! Form::checkbox($field['name'], $name, true) !!}
                                @else
                                    {!! Form::checkbox($field['name'], $name, false) !!}
                                @endif
                                {!! Form::label($field['name'], $title) !!}
                            </div>
                        @endforeach
                    @break
                    @case("radio")
                    @foreach($field['options'] as $name=>$title)
                        <div class="form-check">
                            {!! Form::radio($field['name'], $name, null) !!}
                            {!! Form::label($field['name'], $title) !!}
                        </div>
                    @endforeach
                    @break
        @endswitch
            @endforeach
            <div class="form-group">
                {!! Form::button($submit,['type' => 'submit','class' => 'btn btn-primary']); !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
