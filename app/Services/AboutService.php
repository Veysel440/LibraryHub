<?php

namespace App\Services;


use App\Models\About;
use App\Services\Contracts\AboutServiceInterface;


class AboutService implements AboutServiceInterface
{
    public function getAll()
    {
        return About::all();
    }

    public function store(array $data)
    {
        $about = new About();
        $this->setAboutData($about, $data);
        $about->save();
    }

    public function update(array $data, $about)
    {
        $this->setAboutData($about, $data);
        $about->save();
    }

    public function delete($about)
    {
        $about->delete();
    }

    private function setAboutData($about, $data)
    {
        $about->text = $data['text'];
        $about->vision = $data['vision'];
        $about->phone = $data['phone'];
        $about->email = $data['email'];
        $about->address = $data['address'];
        $about->facebook = $data['facebook'];
        $about->twitter = $data['twitter'];
        $about->instagram = $data['instagram'];
        $about->youtube = $data['youtube'];

        if (isset($data['images'])) {
            $imagePaths = [];
            foreach ($data['images'] as $image) {
                $imagePaths[] = $image->store('about_images', 'public');
            }
            $about->images = json_encode($imagePaths);
        }
    }
}
