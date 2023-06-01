<?php

declare(strict_types=1);

namespace App\Traits;

use App\Domain\Client\Exceptions\CustomException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ControllerTrait
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return $this->repository->index($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validators);

        if ($validator->fails()) {
            return $validator->errors();
        }

        try {
            $returnInsert = $this->repository->store($request->all());

            return $returnInsert;
        } catch (CustomException $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $returnShow = $this->repository->getById($id);

            return $returnShow;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), $this->validators);

        if ($validator->fails()) {
            return $validator->errors();
        }
        try {
            $returnUpdate = $this->repository->update($request->all(), $id);

            return $returnUpdate;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $returnDestroy = $this->repository->destroy($id);

            return $returnDestroy;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Check if possible remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkDelete(int $id)
    {
        $count = $this->repository->checkDelete($id);

        return responseHTTP(
            200,
            false,
            [
                'count' => $count,
                'haveRelationship' => ! empty($count),
            ]
        );
    }

    /**
     * Inactive the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function inactive(int $id)
    {
        try {
            return $this->repository->inactive($id);
        } catch (\Exception $exception) {
            return $exception->getCode()->getMessage();
        }
    }
}
