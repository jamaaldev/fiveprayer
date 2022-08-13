import styled from "styled-components";
import * as React from 'react';
import { useSelector,useDispatch } from "react-redux";
import { RootState } from "../../../app/store";
import { IQFajrVal,IQDhuhrVal,IQAsrVal,IQMaghribVal,IQIshaVal } from "../../features/search/IqamaDelay";
import {TPTimeImsakVal, TPTimeFajrVal,TPTimeSunriseVal,TPTimeDhuhrVal,TPTimeAsrVal,TPTimeSunsetVal,TPTimeMaghribVal,TPTimeIshaVal ,TPTimeMidnightVal} from "../../features/search/tunePrayerTime";
import './css/FPInput.scss'
import { useInsertprayerSettingsMetaAPIMutation } from "../../api/prayerSettingsMetaAPI";
function FPInput({ holder,val }) {
  const [insertprayersettingmeta] = useInsertprayerSettingsMetaAPIMutation();

  // const { IQFajr,IQDhuhr} = useSelector((state:RootState) => state.searchtowncity);
  const dispatch = useDispatch();

  const changeHandle = (e) =>{
    //IqamaDelay
    if(holder === 'IQFajr'){
      dispatch(IQFajrVal(Number(e.target.value) ))
      const IQFajr = { value: Number(e.target.value) , meta: 'IQFajr' };
      insertprayersettingmeta(IQFajr);
    }
    if(holder === 'IQDhuhr'){
      dispatch(IQDhuhrVal(Number(e.target.value) ))
      const IQDhuhr = { value: Number(e.target.value) , meta: 'IQDhuhr' };
      insertprayersettingmeta(IQDhuhr);
    }
    if(holder === 'IQAsr'){
      dispatch(IQAsrVal(Number(e.target.value) ))
      const IQAsr = { value: Number(e.target.value) , meta: 'IQAsr' };
      insertprayersettingmeta(IQAsr);
    }
    if(holder === 'IQMaghrib'){
      dispatch(IQMaghribVal(Number(e.target.value) ))
      const IQMaghrib = { value: Number(e.target.value) , meta: 'IQMaghrib' };
      insertprayersettingmeta(IQMaghrib);
    }
    if(holder === 'IQIsha'){
      dispatch(IQIshaVal(Number(e.target.value) ))
      const IQIsha = { value: Number(e.target.value) , meta: 'IQIsha' };
      insertprayersettingmeta(IQIsha);
    }
    //TunePrayerTime
    if(holder === 'Imsak'){
      dispatch(TPTimeImsakVal(Number(e.target.value) ))
      const Imsak = { value: Number(e.target.value) , meta: 'Imsak' };
      insertprayersettingmeta(Imsak);
    }
    if(holder === 'Fajr'){
      dispatch(TPTimeFajrVal(Number(e.target.value) ))
      // localStorage.setItem('Fajr', JSON.stringify(e.target.value));
      const Fajr = { value: Number(e.target.value) , meta: 'Fajr' };
      insertprayersettingmeta(Fajr);
    }
    if(holder === 'Sunrise'){
      dispatch(TPTimeSunriseVal(Number(e.target.value) ))
      const Sunrise = { value: Number(e.target.value) , meta: 'Sunrise' };
      insertprayersettingmeta(Sunrise);
    }
    if(holder === 'Dhuhr'){
      dispatch(TPTimeDhuhrVal(Number(e.target.value) ))
      const Dhuhr = { value: Number(e.target.value) , meta: 'Dhuhr' };
      insertprayersettingmeta(Dhuhr);
    }
    if(holder === 'Asr'){
      dispatch(TPTimeAsrVal(Number(e.target.value) ))
      const Asr = { value: Number(e.target.value) , meta: 'Asr' };
      insertprayersettingmeta(Asr);
    }
    if(holder === 'Sunset'){
      dispatch(TPTimeSunsetVal(Number(e.target.value) ))
      const Sunset = { value: Number(e.target.value) , meta: 'Sunset' };
      insertprayersettingmeta(Sunset);
    }
    if(holder === 'Maghrib'){
      dispatch(TPTimeMaghribVal(Number(e.target.value) ))
      const Maghrib = { value: Number(e.target.value) , meta: 'Maghrib' };
      insertprayersettingmeta(Maghrib);
    }
    if(holder === 'Isha'){
      dispatch(TPTimeIshaVal(Number(e.target.value) ))
      const Isha = { value: Number(e.target.value) , meta: 'Isha' };
      insertprayersettingmeta(Isha);
    }
    if(holder === 'Midnight'){
      dispatch(TPTimeMidnightVal(Number(e.target.value) ))
      const Midnight = { value: Number(e.target.value) , meta: 'Midnight' };
      insertprayersettingmeta(Midnight);
    }

  }
  return (
    <>
      <div className="FP__input__container">
        <label>{holder}</label>
        <input placeholder={'0'} defaultValue={val} className="FP-input" type={"number"} onChange={changeHandle} />
      </div>
    </>
  );
}

// const FPInputConatiner = styled.section`
//   flex: 1;
  
// `;

export default FPInput;
