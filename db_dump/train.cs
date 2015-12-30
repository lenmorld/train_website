using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Train
{
    #region Purchase
    public class Purchase
    {
        #region Member Variables
        protected int _purchase_ID;
        protected DateTime _time_stamp;
        protected string _username;
        protected unknown _fee;
        protected string _type;
        #endregion
        #region Constructors
        public Purchase() { }
        public Purchase(DateTime time_stamp, string username, unknown fee, string type)
        {
            this._time_stamp=time_stamp;
            this._username=username;
            this._fee=fee;
            this._type=type;
        }
        #endregion
        #region Public Properties
        public virtual int Purchase_ID
        {
            get {return _purchase_ID;}
            set {_purchase_ID=value;}
        }
        public virtual DateTime Time_stamp
        {
            get {return _time_stamp;}
            set {_time_stamp=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual unknown Fee
        {
            get {return _fee;}
            set {_fee=value;}
        }
        public virtual string Type
        {
            get {return _type;}
            set {_type=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Train
{
    #region Stations
    public class Stations
    {
        #region Member Variables
        protected string _line;
        protected string _station;
        #endregion
        #region Constructors
        public Stations() { }
        public Stations(string line)
        {
            this._line=line;
        }
        #endregion
        #region Public Properties
        public virtual string Line
        {
            get {return _line;}
            set {_line=value;}
        }
        public virtual string Station
        {
            get {return _station;}
            set {_station=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Train
{
    #region Times
    public class Times
    {
        #region Member Variables
        protected string _station;
        protected string _direction;
        protected string _times_string;
        #endregion
        #region Constructors
        public Times() { }
        public Times(string station, string direction, string times_string)
        {
            this._station=station;
            this._direction=direction;
            this._times_string=times_string;
        }
        #endregion
        #region Public Properties
        public virtual string Station
        {
            get {return _station;}
            set {_station=value;}
        }
        public virtual string Direction
        {
            get {return _direction;}
            set {_direction=value;}
        }
        public virtual string Times_string
        {
            get {return _times_string;}
            set {_times_string=value;}
        }
        #endregion
    }
    #endregion
}using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Train
{
    #region Users
    public class Users
    {
        #region Member Variables
        protected string _firstname;
        protected string _lastname;
        protected string _address;
        protected string _city;
        protected string _province;
        protected string _postal;
        protected string _email;
        protected string _phone;
        protected string _phone;
        protected unknown _birthday;
        protected string _username;
        protected string _password;
        protected string _cpassword;
        protected bool _zone;
        protected bool _carpool;
        protected string _carpoolBuddies;
        #endregion
        #region Constructors
        public Users() { }
        public Users(string firstname, string lastname, string address, string city, string province, string postal, string email, string phone, string phone, unknown birthday, string password, string cpassword, bool zone, bool carpool, string carpoolBuddies)
        {
            this._firstname=firstname;
            this._lastname=lastname;
            this._address=address;
            this._city=city;
            this._province=province;
            this._postal=postal;
            this._email=email;
            this._phone=phone;
            this._phone=phone;
            this._birthday=birthday;
            this._password=password;
            this._cpassword=cpassword;
            this._zone=zone;
            this._carpool=carpool;
            this._carpoolBuddies=carpoolBuddies;
        }
        #endregion
        #region Public Properties
        public virtual string Firstname
        {
            get {return _firstname;}
            set {_firstname=value;}
        }
        public virtual string Lastname
        {
            get {return _lastname;}
            set {_lastname=value;}
        }
        public virtual string Address
        {
            get {return _address;}
            set {_address=value;}
        }
        public virtual string City
        {
            get {return _city;}
            set {_city=value;}
        }
        public virtual string Province
        {
            get {return _province;}
            set {_province=value;}
        }
        public virtual string Postal
        {
            get {return _postal;}
            set {_postal=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Phone
        {
            get {return _phone;}
            set {_phone=value;}
        }
        public virtual string Phone
        {
            get {return _phone;}
            set {_phone=value;}
        }
        public virtual unknown Birthday
        {
            get {return _birthday;}
            set {_birthday=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Cpassword
        {
            get {return _cpassword;}
            set {_cpassword=value;}
        }
        public virtual bool Zone
        {
            get {return _zone;}
            set {_zone=value;}
        }
        public virtual bool Carpool
        {
            get {return _carpool;}
            set {_carpool=value;}
        }
        public virtual string CarpoolBuddies
        {
            get {return _carpoolBuddies;}
            set {_carpoolBuddies=value;}
        }
        #endregion
    }
    #endregion
}