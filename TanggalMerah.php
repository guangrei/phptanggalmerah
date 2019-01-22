<?php
declare(strict_types=1);
/**
 * PHP Indonesia holiday checker (include sunday)
 *
 * PHP version 7
 *
 * @category library
 * @package  TanggalMerah
 * @author   guangrei <grei@tuta.io>
 * @license  MIT http://opensource.org/licenses/MIT
 * @link     https://github.com/guangrei/phptanggalmerah
 */

namespace Grei;
use DateTime;
use DateTimeZone;
use Exception;
class TanggalMerah
{
    public $event;
    public $date;
    protected $data;
    
    public function __construct(string $local = null)
    {
        $tz = new DateTimeZone("Asia/Jakarta");
        $this->event = [];
        $this->date = new DateTime("now", $tz);
        if (!isset($local)) {
            $r = file_get_contents("https://github.com/guangrei/Json-Indonesia-holidays/raw/master/calendar.json");
            $this->data = json_decode($r, true);
        } else {
            $r = file_get_contents($local);
            $this->data = json_decode($r, true);
        }
    } // end __construct()
    
    public function set_timezone(DateTimeZone $tz) : string
    {
        $this->date = new DateTime("now", $tz);
        return $tz->getName();
    } // end set_timezone()
    
    public function check() : bool
    {
        $check = [$this->is_sunday(), $this->is_holiday()];
        return in_array(true, $check);
    } // end check()
    
    public function is_sunday() : bool
    {
        $day = $this->date->format("D");
        if ($day === "Sun") {
            $this->event[] = 'sunday';
            return true;
        } else {
            return false;
        }
    } // end is_sunday()
    
    public function is_holiday() : bool
    {
        $check = isset($this->data[$this->date->format("Ymd")])?true:false;
        if ($check) {
            $this->event[] = $this->data[$this->date->format("Ymd")]['deskripsi'];
            return true;
        } else {
            return false;
        }
    } // end is_holiday()
    
    public function set_date(string $date) : string
    {
        $this->date = new DateTime($date);
        return $date;
    } // end set_date()
    
    public function get_event() : array
    {
        return $this->event;
    } // end get_event()
} // end class TanggalMerah
