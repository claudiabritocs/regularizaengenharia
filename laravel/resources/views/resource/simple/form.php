@include('<?=$namespace?>.common.flash')

<?php foreach($gen->fields as $field): ?>
<?php if(strpos($field['validation'], 'image') !== false): ?>
<div class="well form-group">
    {!! Form::label('<?=$field['name']?>', '<?=$field['alias']?>') !!}
    <img src="{{ url('assets/img/<?=$route?>/'.$registro-><?=$field['name']?>) }}" style="display:block; margin-bottom: 10px; max-width: 100%;">
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
