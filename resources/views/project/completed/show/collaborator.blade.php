<table class="table table-striped table-sm mt-3 text-center"
       style="margin-bottom: 0rem;">
    <colgroup>
        <col style="width:25%">
        <col style="width:25%">
        <col style="width:25%">
        <col style="width:25%">
    </colgroup>
    <thead class="bg-dark text-light">
    <tr>
        <th scope="col">작곡</th>
        <th scope="col">편곡</th>
        <th scope="col">작사</th>
        <th scope="col">보컬</th>
    </tr>
    </thead>
    <tbody class="bg-light">
    <tr>
        <td>
            @forelse($project->composers()->get() as $composer)
                <div>
                    <a class="text-dark" href="{{ route('user.show', ['producer', $composer->user->id]) }}">
                        {{ $composer->user->name }}
                    </a>
                </div>
            @empty
            @endforelse
        </td>
        <td>
            @forelse($project->editors()->get() as $editor)
                <div>
                    <a class="text-dark" href="{{ route('user.show', ['producer', $editor->user->id]) }}">
                        {{ $editor->user->name }}
                    </a>
                </div>
            @empty
            @endforelse
        </td>
        <td>
            @forelse($project->lyricists()->get() as $lyricist)
                <div>
                    <a class="text-dark" href="{{ route('user.show', ['producer', $lyricist->user->id]) }}">
                        {{ $lyricist->user->name }}
                    </a>
                </div>
            @empty
            @endforelse
        </td>
        <td>
            @forelse($project->singers()->get() as $singer)
                <div>
                    <a class="text-dark" href="{{ route('user.show', ['singer', $singer->user->id]) }}">
                        {{ $singer->user->name }}
                    </a>
                </div>
            @empty
            @endforelse
        </td>
    </tr>
    </tbody>
</table>
