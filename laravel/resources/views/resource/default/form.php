@include('<?=$namespace?>.common.flash')

<?php if($gen->categories): ?>
<div class="form-group">
    {!! Form::label('<?=$route?>_categoria_id', 'Categoria') !!}
    {!! Form::select('<?=$route?>_categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Selecione']) !!}
</div>

<?php endif; ?>
<?php if($gen->tags): ?>
    <div class="form-group">
        {!! Form::label('tags', 'Tags') !!}
        {!! Form::select('tags[]', $tags, isset($registro) ? $registro->tags->pluck('id')->toArray() : null, ['class' => 'form-control multi-select', 'multiple' => true]) !!}
    </div>

<?php endif; ?>
<?php foreach($gen->fields as $field): ?>
<?php if(strpos($field['validation'], 'image') !== false): ?>
<div class="well form-group">
    {!! Form::label('<?=$field['name']?>', '<?=$field['alias']?>') !!}
@if($submitText == 'Alterar')
    <img src="{{ url('assets/img/<?=$route?>/'.$registro-><?=$field['name']?>) }}" style="display:block; margin-bottom: 10px; max-width: 100%;">
@endif
    {!! Form::file('<?=$field['name']?>', ['class' => 'form-control']) !!}
</div>
<?php else: ?>
<div class="form-group">
    {!! Form::label('<?=$field['name']?>', '<?=$field['alias']?>') !!}
    {!! Form::<?=($field['type'] == 'text' ? 'textarea' : 'text')?>('<?=$field['name']?>', null, ['class' => 'form-control']) !!}
</div>
<?php endif; ?>

<?php endforeach; ?>
{!! Form::submit($submitText, ['class' => 'btn btn-success']) !!}

<a href="{{ route('<?=$namespace?>.<?=$route?>.index') }}" class="btn btn-default btn-voltar">Voltar</a>
