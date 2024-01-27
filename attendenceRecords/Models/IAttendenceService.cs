using System.ServiceModel;

namespace Models{
    [ServiceContract]
    public interface IAttendenceService{
      /*[OperationContract]
      string Test(string s);*/

      [OperationContract]
      double GetAttendancePercentage(string name);

      [OperationContract]
      int ActivitiesAttended(string name);

      [OperationContract]
      DateTime GetActivityDate(string activityName);

      [OperationContract]
      double GetActivityPrice(string activityName);

      [OperationContract]
      void AddActivity(string eventName, DateTime date, double price, string attendee);

      [OperationContract]
      void AddActivityToPerson(string personName,string eventName);
      
      [OperationContract]
      void AddPerson(string name);

      [OperationContract]
      List<string> GetMembers();


      [OperationContract]
      List<Activity> GetActivities();
    }
}