<?php

namespace Chivincent\Youku\Api\Response;

use Chivincent\Youku\Contracts\JsonResponse;
use Chivincent\Youku\Exception\UploadException;

class UploadSlice extends Slice implements JsonResponse
{
    /**
     * UploadSlice constructor.
     *
     * @param int $sliceTaskId
     * @param int $offset
     * @param int $length
     * @param int $transferred
     * @param bool $finished
     */
    public function __construct(int $sliceTaskId, int $offset, int $length, int $transferred, bool $finished)
    {
        parent::__construct($sliceTaskId, $offset, $length, $transferred, $finished);
    }

    /**
     * Make UploadSlice Response by json.
     *
     * @param string $json
     * @return UploadSlice|null
     */
    public static function json(string $json): ?BaseResponse
    {
        $response = json_decode($json);

        if (isset($response->error)) {
            throw new UploadException(Error::json($json));
        }

        $properties = [
            'slice_task_id', 'offset', 'length', 'transferred', 'finished',
        ];

        foreach ($properties as $property) {
            if (!property_exists($response, $property)) {
                return null;
            }
        }

        return new self(
            $response->slice_task_id,
            $response->offset,
            $response->length,
            $response->transferred,
            $response->finished
        );
    }
}
