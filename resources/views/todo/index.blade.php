<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <div class="container">
    <div class="card">
      <p class="title">Todo List</p>
      <div class="todo">
        <form action="/todo/create" method="post" class="add-area">
          @csrf
          @error('content')
          <ul>
            <li>{{$message}}</li>
            @enderror
          </ul>
          <input type="text" name="content" class="input-add" value="">
          <input type="submit" class="button-add" value="追加">

        </form>
        <table>
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>更新</th>
              <th>削除</th>
            </tr>

            @foreach($tasks as $task)
            <tr>

              <form action="{{route('todo.update',['id'=>$task->id])}}" method="post">
                @csrf
                <td>
                  {{$task->created_at}}
                  <input type="hidden" class="id" value="{{$task->id}}">
                </td>
                <td>
                  <input type="text" class="update-input" value="{{$task->content}}" name="content">
                </td>
                <td>
                  <button class="update-button">更新</button>
                </td>
              </form>

              <td>
                <form action="/todo/delete" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$task->id}}">
                  <button class="delete-button">削除</button>
                </form>
              </td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>