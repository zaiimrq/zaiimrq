<?php

namespace Src\DataTransfersObject;

use App\Http\Requests\ProjectRequest;
use Illuminate\Http\UploadedFile;

readonly class Project
{
    public function __construct(
        public readonly UploadedFile $image,
        public readonly string $title,
        public readonly string $subtitle,
    ) {}

    public static function FromRequest(ProjectRequest $request): self
    {
        return new self(
            image: $request->validated('image'),
            title: $request->validated('title'),
            subtitle: $request->validated('subtitle')
        );
    }
}
