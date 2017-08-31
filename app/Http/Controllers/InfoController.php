<?PHP

namespace App\Http\Controllers;

use App\StreetData;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class InfoController extends Controller
{
    public function index()
    {
        return view('info.index', [
            'infos' => StreetData::query()->limit(10)->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        function saveThumb(Request $request){
            $image = $request->file('image_url');

            $destinationPath = public_path('images/events/');
            $img = Image::make($image->getRealPath());
            $new_image_name = time().'.'.$image->getClientOriginalExtension();
            $img->save($destinationPath.$new_image_name,20);

            $destinationPath = public_path('images/events/thumbs/');
            $thumb_path = $destinationPath.$new_image_name;

            $img->resize(rand (400, 800), null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumb_path,20);

            return [
                "url" => $new_image_name,
                "color" => $img->limitColors(1)->pickColor(0, 0, 'hex')
            ];
        }

        $more_info = saveThumb($request);
        $url = null;
        $yt_id = $request->input('yt_id');

        $info = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'url' => $more_info['url'],
            'placeholder_color' => $more_info['color'],
            'yt_id' => $yt_id
        ];

        return StreetData::create($info);
    }
}
