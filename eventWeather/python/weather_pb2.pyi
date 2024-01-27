from google.protobuf import descriptor as _descriptor
from google.protobuf import message as _message
from typing import ClassVar as _ClassVar, Optional as _Optional

DESCRIPTOR: _descriptor.FileDescriptor

class WeatherRequest(_message.Message):
    __slots__ = ["date", "location"]
    DATE_FIELD_NUMBER: _ClassVar[int]
    LOCATION_FIELD_NUMBER: _ClassVar[int]
    date: str
    location: str
    def __init__(self, date: _Optional[str] = ..., location: _Optional[str] = ...) -> None: ...

class WeatherResponse(_message.Message):
    __slots__ = ["Temp", "neerslag", "windspeed"]
    TEMP_FIELD_NUMBER: _ClassVar[int]
    NEERSLAG_FIELD_NUMBER: _ClassVar[int]
    WINDSPEED_FIELD_NUMBER: _ClassVar[int]
    Temp: str
    neerslag: str
    windspeed: float
    def __init__(self, Temp: _Optional[str] = ..., neerslag: _Optional[str] = ..., windspeed: _Optional[float] = ...) -> None: ...
