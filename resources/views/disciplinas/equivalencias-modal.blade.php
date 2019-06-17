<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                Disciplinas equivalentes a {{ $disciplina->nome }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    &times;
                </span>
            </button>
        </div>

        <div id="show_modal" class="modal-body">
            @if(count($disciplina->equivalencias) > 0)
                
            @foreach ($disciplina->equivalencias as $e)

            {{ $e->nome }} - {{ $e->matriz->curso->nome }} ({{ $e->matriz->nome }})<br><br>

            @endforeach
            @else
            Esta disciplina não possui disciplinas equivalentes.
            @endif

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                {{ __('Fechar') }}
            </button>
        </div>
    </div>
</div>