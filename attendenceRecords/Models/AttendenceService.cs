namespace Models{
    public class AttendenceService: IAttendenceService{
        private static Dictionary<string, List<Activity>> memberActivities = new();
        private int totalActivities = 0;

        /*public string Test(string s){
            Console.WriteLine("Test method Executed!");
            return "Test";
        }*/
            

        public double GetAttendancePercentage(string name){
            if(!memberActivities.ContainsKey(name)){
                return 0;
            }
            int activities = memberActivities[name].Count;
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
            var activity = new Activity{
                Name=eventName, 
                Date=date, 
                Price=price
            };

            if(!memberActivities.ContainsKey(attendee)){
                memberActivities[attendee] = new List<Activity>();
            }

            memberActivities[attendee].Add(activity);
            totalActivities = totalActivities+1;
        }
        
        public List<string> GetMembers(){
            List<string> members = new List<string>();
            foreach(KeyValuePair<string, List<Activity>> pair in memberActivities){
                members.Add(pair.Key);
            }
            return members;
        }

        /*public List<Activity> GetActivities(){
            List<Activity> activities = new List<Activity>();
            foreach(KeyValuePair<string, List<Activity>> pair in memberActivities){
                foreach(Activity activity in pair.Value){
                    if(!activities.Contains(activity)){
                        activities.Add(activity);
                    }
                }
            }
            return activities;
        }*/
    }
}