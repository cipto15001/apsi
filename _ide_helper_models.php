<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Job
 *
 * @property int $id
 * @property int $job_number
 * @property int $user_id
 * @property int $simulation_id
 * @property string $name
 * @property string $status
 * @property \Illuminate\Database\Eloquent\Collection|\App\JobParameter[] $parameters
 * @property string $key
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Simulation $simulation
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereJobNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereSimulationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Job whereUserId($value)
 */
	class Job extends \Eloquent {}
}

namespace App{
/**
 * App\JobParameter
 *
 */
	class JobParameter extends \Eloquent {}
}

namespace App{
/**
 * App\Parameter
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Parameter whereUpdatedAt($value)
 */
	class Parameter extends \Eloquent {}
}

namespace App{
/**
 * App\ParameterValue
 *
 */
	class ParameterValue extends \Eloquent {}
}

namespace App{
/**
 * App\Simulation
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $image
 * @property string|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Job[] $jobs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Parameter[] $parameters
 * @property-read \App\Upload $upload
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Simulation whereUpdatedAt($value)
 */
	class Simulation extends \Eloquent {}
}

namespace App{
/**
 * App\Upload
 *
 * @property int $id
 * @property string $file_name
 * @property string $client_file_name
 * @property string $extension
 * @property int $size
 * @property string $mime
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read string $url
 * @property-read \App\User $uploader
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Upload whereClientFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Upload whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Upload whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Upload whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Upload whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Upload whereUpdatedAt($value)
 */
	class Upload extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $role
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Job[] $job
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Simulation[] $simulations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

