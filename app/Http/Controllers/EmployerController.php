<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class EmployerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/employers",
     *     summary="Get all the employers",
     *     tags={"employers"},
     *     description="This endpoint returns all the existing empployers",
     *     operationId="getEmployers",
     *     @OA\Response(
     *         response=200,
     *         description="Employers list",
         *     @OA\MediaType(
         *              mediaType="application/json",
         *         @OA\Schema(
         *             type="array",
         *             @OA\Items(
         *                 type="object",
         *                  @OA\Property(
         *                      property="name",
         *                      type="string"
         *                  ),
         *                  @OA\Property(
         *                       property="id",
         *                       type="integer"
         *                   ),
         *                   @OA\Property(
         *                       property="position",
         *                       type="string"
         *                   ),
         *                   @OA\Property(
         *                       property="salary",
         *                       type="integer"
         *                   ),
         *              )
         *         ),
         *     ),
     *   ),
     * )
     */


    public static function get() : array
    {
        $employers = DB::table('employers')->get(['name', 'id', 'position', 'salary']);
        return ['employers' => $employers];
    }

    /**
     * @OA\Post(
     *     path="/api/employers",
     *     summary="Add new employer to the table",
     *     tags={"employers"},
     *     description="This endpoint inserts new row into employers' table",
     *     operationId="addEmployers",
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *        mediaType="application/x-www-form-urlencoded",
     *        @OA\Schema(
     *          required={"name", "position", "salary"},
     *          @OA\Property(
     *            description="Employer's name",
     *            property="name",
     *            type="string"
     *          ),
     *          @OA\Property(
     *            description="Employer's job title",
     *            property="position",
     *            type="string"
     *          ),
     *          @OA\Property(
     *            description="Employer's salary",
     *            property="salary",
     *            type="integer"
     *          )
     *        )
     *      )
     *    ),
     *    @OA\Response(
     *      response=200, description="Success",
     *      @OA\Schema(type="string")
     *    ),
     *    @OA\Response(
     *      response=400, description="Bad Request"
     *    )
     *   )
     *  )
     */
    public static function add(array $employer): array
    {
        $status = DB::table('employers')->insert($employer);
        if ($status === false) {
            return ["status" => "fail"];
        }
        return ["status" => "ok"];
    }
    /**
     * @OA\Delete(
     *     path="/api/employers",
     *     summary="Delete existing employer from the table",
     *     tags={"employers"},
     *     description="This endpoint inserts deletes row from employers' table",
     *     operationId="deleteEmployers",
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *        mediaType="application/x-www-form-urlencoded",
     *        @OA\Schema(
     *          required={"id"},
     *          @OA\Property(
     *            description="Employer's row id",
     *            property="id",
     *            type="integer"
     *          )
     *        )
     *      )
     *    ),
     *    @OA\Response(
     *      response=200, description="Success",
     *      @OA\Schema(type="string")
     *    ),
     *    @OA\Response(
     *      response=400, description="Bad Request"
     *    )
     *   )
     *  )
     */
    public static function delete(int $employerId): array
    {
        $status = DB::table('employers')->where('id', $employerId)->delete();
        if ($status === 0) {
            return ["status" => "fail"];
        }
        return ["status" => "ok"];
    }

    /**
     * @OA\Patch(
     *     path="/api/employers",
     *     summary="Edit existing employer's row",
     *     tags={"employers"},
     *     description="This endpoint inserts new row into employers' table",
     *     operationId="editEmployers",
     *     @OA\RequestBody(
     *      required=true,
     *      @OA\MediaType(
     *        mediaType="application/x-www-form-urlencoded",
     *        @OA\Schema(
     *          required={"id"},
     *        @OA\Property(
     *             description="Employer's row id",
     *             property="id",
     *             type="integer"
     *           ),
     *          @OA\Property(
     *            description="Employer's name",
     *            property="name",
     *            type="string"
     *          ),
     *          @OA\Property(
     *            description="Employer's job title",
     *            property="position",
     *            type="string"
     *          ),
     *          @OA\Property(
     *            description="Employer's salary",
     *            property="salary",
     *            type="integer"
     *          )
     *        )
     *      )
     *    ),
     *    @OA\Response(
     *      response=200, description="Success",
     *      @OA\Schema(type="string")
     *    ),
     *    @OA\Response(
     *      response=400, description="Bad Request"
     *    )
     *   )
     *  )
     */
    public static function edit(array $employer): array
    {
        $employerId = $employer['id'];
        $employerData = array_slice($employer, 1);
        $status = DB::table('employers')->where('id', $employerId)->update($employerData);
        if ($status === 0) {
            return ["status" => "fail"];
        }
        return ["status" => "ok"];
    }
}
