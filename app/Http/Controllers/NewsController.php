<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\AddRequest;
    use App\Models\News;

    class NewsController extends Controller
    {
        public function addNews(AddRequest $data)
        {
            $news = new News();
            $news->title = trim(htmlentities($data->input('title')));
            $news->short = trim(htmlentities($data->input('short')));
            $news->image_path = trim(htmlentities($data->input('image')));
            $news->full = trim(htmlentities($data->input('full')));

            $news->save();

            return redirect()->route('home')->with('success', 'Новость добавлена!');
        }

        public function showAll()
        {
            $news = new News();
            return view('home ', ['news' => $news->orderBy('created_at', 'desc')->get()]);
        }

        public function showNews(int $id)
        {
            $news = new News();
            $info = $news->find($id);
            if ($info) {
                return view('fullInfo ', ['news' => $info]);
            } else {
                return abort(404);
            }
        }

        public function updateNews(int $id)
        {
            $news = new News();
            $info = $news->find($id);
            if ($info) {
                return view('updateInfo ', ['news' => $info]);
            } else {
                return abort(404);
            }
        }

        public function updateNewsSubmit(int $id, AddRequest $data)
        {
            $news = News::find($id);
            $news->title = trim(htmlentities($data->input('title')));
            $news->short = trim(htmlentities($data->input('short')));
            $news->image_path = trim(htmlentities($data->input('image')));
            $news->full = trim(htmlentities($data->input('full')));

            $news->save();

            return redirect()->route('newsLink', $id)->with('success', 'Новость была обновлена!');
        }

        public function deleteNews(int $id)
        {
            $news = new News();
            $info = $news->find($id);
            return view('deleteNewsPage', ['news' => $info]);
        }

        public function exactlyDelete(int $id){
            News::find($id)->delete();
            return redirect()->route('home')->with('success', 'Новость успешно удалена!');
        }
    }
