using System.ComponentModel;

namespace Models{
    public class AttendenceService: IAttendenceService{
        private static Dictionary<string, List<Activity>> memberActivities = new();
        private int totalActivities = 0;
            

        public double GetAttendancePercentage(string name){
            if(!memberActivities.ContainsKey(name)){
                return 0;
            }
            int activities = memberActivities[name].Count;
            if(activities == 0){return 0;}
            double percentage = (double)activities/totalActivities*100;
            Console.WriteLine("Total activities" + totalActivities);
            return percentage;
        }

        public int ActivitiesAttended(string name){
            if(!memberActivities.ContainsKey(name)){
                return 0;
            }
            int activities = memberActivities[name].Count;
            return activities;
        }

        public DateTime GetActivityDate(string activityName){
            Activity activity = FindActivity(activityName);
            if(activity == null){
                return new DateTime();
            }
            return activity.Date;
        }

        public double GetActivityPrice(string activityName){
            Activity activity = FindActivity(activityName);
            if(activity == null){
                return 0.0;
            }

            return activity.Price;
        }

        private Activity FindActivity(string activityName){
            foreach(string key in memberActivities.Keys){
                foreach(Activity activity in memberActivities[key]){
                    if(activity.Name == activityName){
                        return activity;
                    }
                }
            }
            return null;
        }

        public void AddActivity(string eventName, DateTime date, double price, string attendee){
            eventName = char.ToUpper(eventName[0]) + eventName.Substring(1);
            var activity = new Activity{
                Name=eventName, 
                Date=date, 
                Price=price
            };

            if(!memberActivities.ContainsKey(attendee)){
                //https://www.educative.io/answers/how-to-capitalize-the-first-letter-of-a-string-in-c-sharp
                attendee = char.ToUpper(attendee[0]) + attendee.Substring(1);
                memberActivities[attendee] = new List<Activity>();
            }

            var activities = GetActivities();
            foreach(Activity act in activities){
                if(act.Name == eventName && act.Price == price && act.Date == date){
                    memberActivities[attendee].Add(activity);
                    break;
                }
                else{
                    memberActivities[attendee].Add(activity);
                    totalActivities++;
                    break;
                }
            }
            if(activities.Count ==0){
                memberActivities[attendee].Add(activity);
                totalActivities++;
            }   
        }

        public void AddPerson(string name){
            //https://www.educative.io/answers/how-to-capitalize-the-first-letter-of-a-string-in-c-sharp
            name = char.ToUpper(name[0]) + name.Substring(1);
            if(!memberActivities.ContainsKey(name)){
                memberActivities[name] = new List<Activity>();
            }
        }

        public void AddActivityToPerson(string personName,string eventName){
            var activity = FindActivity(eventName);
            personName = char.ToUpper(personName[0]) + personName.Substring(1);
            if(!memberActivities.ContainsKey(personName)){
                memberActivities[personName] = new List<Activity>();
            }
            memberActivities[personName].Add(activity);
        }
        
        public List<string> GetMembers(){
            addSamples();
            List<string> members = new List<string>();
            foreach(KeyValuePair<string, List<Activity>> pair in memberActivities){
                members.Add(pair.Key);
            }
            return members;
        }

        private void addSamples(){
            AddPerson("Monro Yepiskopov");
            AddPerson("Ainslee Nares");
            AddPerson("Tadeas Coyte");
            AddPerson("Elsworth Cheine");
            AddPerson("Beatrice MacRierie");
            AddPerson("Arri Checklin");
            AddPerson("Meghann Kendall");
            AddPerson("Zach Bruty");
        }

        public List<Activity> GetActivities(){
            List<Activity> activities = new List<Activity>();
            foreach(string key in memberActivities.Keys){
                foreach(Activity activity in memberActivities[key]){
                    if(activities.Contains(activity) == false){
                        activities.Add(activity);
                    }
                }
            }
            return activities;
        }
    }
}