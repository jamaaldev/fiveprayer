// this is a feature that i am not done with it,
class MasjidJamaah {

  constructor(times) {
    this.times = times;
  }

  FajrJamah() {
    let hourprayer = 1 * (this.times.fajr + "").split(/[^0-9.+-]/)[0];
    let minprayer = 1 * (this.times.fajr + "").split(/[^0-9.+-]/)[1];
    const lastmin = String(minprayer).slice(-1); // 👉️ '7'
    const lastsecondmin = String(minprayer).slice(-2, 1); // 👉️ '7'

    // if(((parseInt(lastsecondmin) === 0 ) && ( parseInt(lastmin) === 0 ))){
    //   this.times.fajr_masjid_jamaah = hourprayer + ':' + (minprayer +16) % 60
    // }
    let date = new Date();
    let firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    let lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    const dayOne = 1;
    const timeMin = 18;
    for (let i = firstDay.getDate(); i < lastDay.getDate(); i++) {

      if (+this.times.today >= dayOne && minprayer >= 0 && minprayer <= 14) {

        this.times.fajr_iqamah = hourprayer + ':' + (14 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 15 && minprayer <= 29) {

        this.times.fajr_iqamah = hourprayer + ((29 + timeMin) >= 60 ? 1 : '') + ':' + ((29 + timeMin) >= 60 ? 0 : (29 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 30 && minprayer <= 44) {

        this.times.fajr_iqamah = hourprayer + ((44 + timeMin) >= 60 ? 1 : '') + ':' + ((44 + timeMin) >= 60 ? 0 : (44 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 45 && minprayer <= 59) {

        this.times.fajr_iqamah = hourprayer + ((60 + timeMin) >= 60 ? 1 : '') + ':' + ((60 + timeMin) >= 60 ? 15 : 15);
      }
     

    }

  }

  DuhrJamah() {
    let hourprayer = 1 * (this.times.dhuhr + "").split(/[^0-9.+-]/)[0];
    let minprayer = 1 * (this.times.dhuhr + "").split(/[^0-9.+-]/)[1];
   
    let date = new Date();
    let firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    let lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    const dayOne = 1;
    const timeMin = 30;
    for (let i = firstDay.getDate(); i < lastDay.getDate(); i++) {

      if (+this.times.today >= dayOne && minprayer >= 0 && minprayer <= 7) {

        this.times.dhuhr_iqamah = hourprayer + ':' + (7 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 8 && minprayer <= 14) {

        this.times.dhuhr_iqamah = hourprayer + ':' + (14 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 15 && minprayer <= 21) {

        this.times.dhuhr_iqamah = hourprayer + ':' + (21 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 22 && minprayer <= 28) {

        this.times.dhuhr_iqamah = hourprayer + ((28 + timeMin) >= 60 ? 1 : '') + ':' + ((28 + timeMin) >= 60 ? 0 : (28 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 29 && minprayer <= 35) {

        this.times.dhuhr_iqamah = hourprayer + ((35 + timeMin) >= 60 ? 1 : '') + ':' + ((35 + timeMin) >= 60 ? 0 : (35 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 36 && minprayer <= 42) {

        this.times.dhuhr_iqamah = hourprayer + ((42 + timeMin) >= 60 ? 1 : '') + ':' + ((42 + timeMin) >= 60 ? 0 : (42 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 43 && minprayer <= 49) {

        this.times.dhuhr_iqamah = hourprayer + ((49 + timeMin) >= 60 ? 1 : '') + ':' + ((49 + timeMin) >= 60 ? 0 : (49 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 50 && minprayer <= 60) {

        this.times.dhuhr_iqamah = hourprayer + ((56 + timeMin) >= 60 ? 1 : '') + ':' + ((56 + timeMin) >= 60 ? 0 : (56 + timeMin));
      }
    }
  }

  AsrJamah() {
    let hourprayer = 1 * (this.times.asr + "").split(/[^0-9.+-]/)[0];
    let minprayer = 1 * (this.times.asr + "").split(/[^0-9.+-]/)[1];
    let date = new Date();
    let firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    let lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    const dayOne = 1;
    const timeMin = 30;
    for (let i = firstDay.getDate(); i < lastDay.getDate(); i++) {
      if (+this.times.today >= dayOne && minprayer >= 0 && minprayer <= 7) {

        this.times.asr_iqamah = hourprayer + ':' + (7 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 8 && minprayer <= 14) {

        this.times.asr_iqamah = hourprayer + ':' + (14 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 15 && minprayer <= 21) {

        this.times.asr_iqamah = hourprayer + ':' + (21 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 22 && minprayer <= 28) {

        this.times.asr_iqamah = hourprayer + ((28 + timeMin) >= 60 ? 1 : '') + ':' + ((28 + timeMin) >= 60 ? 0 : (28 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 29 && minprayer <= 35) {

        this.times.asr_iqamah = hourprayer + ((35 + timeMin) >= 60 ? 1 : '') + ':' + ((35 + timeMin) >= 60 ? 0 : (35 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 36 && minprayer <= 42) {

        this.times.asr_iqamah = hourprayer + ((42 + timeMin) >= 60 ? 1 : '') + ':' + ((42 + timeMin) >= 60 ? 0 : (42 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 43 && minprayer <= 49) {

        this.times.asr_iqamah = hourprayer + ((49 + timeMin) >= 60 ? 1 : '') + ':' + ((49 + timeMin) >= 60 ? 0 : (49 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 50 && minprayer <= 60) {

        this.times.asr_iqamah = hourprayer + ((56 + timeMin) >= 60 ? 1 : '') + ':' + ((56 + timeMin) >= 60 ? 0 : (56 + timeMin));
      }


    }

  }

  MaghribJamah() {
    let hourprayer = 1 * (this.times.maghrib + "").split(/[^0-9.+-]/)[0];
    let minprayer = 1 * (this.times.maghrib + "").split(/[^0-9.+-]/)[1];
    let date = new Date();
    let firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    let lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    const dayOne = 1;
    const timeMin = 7;
    for (let i = firstDay.getDate(); i < lastDay.getDate(); i++) {

      if (+this.times.today >= dayOne && minprayer >= 0 && minprayer <= 7) {

        this.times.maghrib_iqamah = hourprayer + ':' + (7 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 8 && minprayer <= 14) {

        this.times.maghrib_iqamah = hourprayer + ':' + (14 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 15 && minprayer <= 21) {

        this.times.maghrib_iqamah = hourprayer + ':' + (21 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 22 && minprayer <= 28) {

        this.times.maghrib_iqamah = hourprayer + ((28 + timeMin) >= 60 ? 1 : '') + ':' + ((28 + timeMin) >= 60 ? 0 : (28 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 29 && minprayer <= 35) {

        this.times.maghrib_iqamah = hourprayer + ((35 + timeMin) >= 60 ? 1 : '') + ':' + ((35 + timeMin) >= 60 ? 0 : (35 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 36 && minprayer <= 42) {

        this.times.maghrib_iqamah = hourprayer + ((42 + timeMin) >= 60 ? 1 : '') + ':' + ((42 + timeMin) >= 60 ? 0 : (42 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 43 && minprayer <= 49) {

        this.times.maghrib_iqamah = hourprayer + ((49 + timeMin) >= 60 ? 1 : '') + ':' + ((49 + timeMin) >= 60 ? 0 : (49 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 50 && minprayer <= 60) {

        this.times.maghrib_iqamah = hourprayer + ((56 + timeMin) >= 60 ? 1 : '') + ':' + ((56 + timeMin) >= 60 ? 0 : (56 + timeMin));
      }

    }

  }

  IshaJamah() {
    let hourprayer = 1 * (this.times.isha + "").split(/[^0-9.+-]/)[0];
    let minprayer = 1 * (this.times.isha + "").split(/[^0-9.+-]/)[1];
    let date = new Date();
    let firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    let lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    const dayOne = 1;
    const timeMin = 7;
    for (let i = firstDay.getDate(); i < lastDay.getDate(); i++) {

      if (+this.times.today >= dayOne && minprayer >= 0 && minprayer <= 12) {

        this.times.isha_iqamah = hourprayer + ':' + (12 + timeMin);
      }
      if (+this.times.today >= dayOne && minprayer >= 13 && minprayer <= 25) {

        this.times.isha_iqamah = hourprayer + ((25 + timeMin) >= 56 ? 1 : '') + ':' + ((25 + timeMin) >= 60 ? timeMin : (25 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 26 && minprayer <= 40) {

        this.times.isha_iqamah = hourprayer + ((40 + timeMin) >= 56 ? 1 : '') + ':' + ((40 + timeMin) >= 60 ? timeMin : (40 + timeMin));
      }
      if (+this.times.today >= dayOne && minprayer >= 41 && minprayer <= 59) {

        this.times.isha_iqamah = hourprayer + ((59 + timeMin) >= 56 ? 1 : '') + ':' + ((59 + timeMin) >= 56 ? timeMin : (59 + timeMin));
      }

    }

  }


}

export default MasjidJamaah;