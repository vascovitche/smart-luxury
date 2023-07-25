<?php

namespace Modules\Admin\Http\Controllers\Property;

use App\Enums\Lang;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Models\Language;
use Modules\Admin\Models\Property;

class PropertyController extends AdminController
{
    public function index()
    {
        $properties = Property::with([
            'images',
            'translations' => static function ($query) {
                $query->select('code');
            }])->latest('updated_at')->paginate();

        return $this->view('property.index', ['properties' => $properties]);
    }

    public function show(Property $property)
    {

    }

    public function edit(Request $request, Property $property)
    {
        $languageCode = $request->get('lang', Lang::default());

        $property->load([
            'translations' => static function ($query) use ($languageCode) {
                $query->where('code', $languageCode);
            },
            'images',
        ]);

        $languages = $this->getLanguages();
        $language = Language::find($languageCode);

        return $this->view('property.edit', [
            'property' => $property,
            'languages' => $languages,
            'language' => $language,
        ]);
    }

    public function store()
    {
        $property = Property::create();

        $this->showSuccessMessage('Продукт недвижимости успешно создан.');
        return redirect(route('admin.property.edit', $property->id));
    }

    public function update(Request $request, Property $property)
    {

    }

    public function updateTranslation(Request $request, Property $property)
    {

    }
}