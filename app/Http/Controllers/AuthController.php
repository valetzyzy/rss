<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class AuthController extends ApiController
{
    /**
     * Create a new AuthController instance.
     * @todo implement forgot password logic
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'checkEmail']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $user = User::where('email', '=', $request->get('email'))->first();

        if (!$user
            || !Hash::check($request->get('password'), $user->password)
            || !$token = auth()->login($user)) {
            return $this->responseWithError('Invalid email or password', 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function user()
    {
        $user = auth()->user();

        if (!$user) {
            return $this->responseWithError('Invalid email or password', 401);
        }

        $data = [
            'status' => 'success',
            'data' => [
                'id' => encrypt($user->id),
                'email' => $user->email,
                'name' => $user->name
            ]
        ];

        return $this->responseWithSuccess($data);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return $this->responseWithSuccess(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Create new user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'passwordAgain' => 'required|same:passwordAgain',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseWithError($validator->getMessageBag()->all(), 400);
        }

        $user = new User([
            'email' => $request->get('email'),
            'password' => \Hash::make($request->get('password')),
            'name' => $request->get('name')
        ]);
        $user->save();

        return $this->responseWithSuccess(['status' => 'success']);
    }

    /**
     * Check if email is exists
     *
     * @param Request $request
     * @return
     */
    public function checkEmail(Request $request)
    {
        $rules = [
            'email' => 'required|email',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseWithError($validator->getMessageBag()->all(), 400);
        }

        $user = User::whereEmail($request->get('email'))->exists();

        if ($user) {
            return $this->responseWithError(['This Email already exists'], 409);
        }

        return $this->responseWithSuccess(['status' => 'success']);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return $this->responseWithSuccess([
            'token' => $token,
            'status' => 'success'
        ])->header('Authorization', $token);
    }
}
