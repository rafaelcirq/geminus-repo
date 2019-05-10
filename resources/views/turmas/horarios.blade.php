<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">
				Horários de Aula - {{ $turma->disciplina->nome }}, turma {{ $turma->nome }}
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">
					&times;
				</span>
			</button>
		</div>

		<div id="show_modal" class="modal-body">

            @foreach ($horarios as $horario)
				{{ $horario->dia }}, {{ $horario->hora_inicio }} às {{ $horario->hora_fim }}<br><br>
			@endforeach
            
		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">
				{{ __('Fechar') }}
			</button>			
		</div>
	</div>
</div>