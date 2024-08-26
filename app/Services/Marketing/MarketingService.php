<?php

namespace App\Services\Marketing;

use App\Models\Marketing;

class MarketingService
{
    public function dataIndex(?string $search = null): array
    {
        $marketing = Marketing::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        return [
            'marketing' => $marketing,
        ];
    }

    public function store(array $data): Marketing
    {
        return Marketing::create($data);
    }

    public function update(Marketing $marketing, array $data): bool
    {
        return $marketing->update($data);
    }

    public function destroy(Marketing $marketing): ?bool
    {
        return $marketing->delete();
    }
}
