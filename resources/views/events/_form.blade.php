<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
	<label for="title" class="control-label sr-only">Titre</label>
	<input type="text" id="title" name="title" placeholder="titre de l'évenement" value="{{ old('title') ?? $event->title }}" class="form-control">
	{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="control-label sr-only">description</label>
	<textarea class="form-control" name="description" id="description" cols="38" placeholder="Description de l'évenement">{{ old('description') ?? $event->description }}</textarea>
	{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
	<input type="submit" value="{{ $submitButtonText }}" class="btn btn-primary btn-block">
</div>