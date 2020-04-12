(function (a)
{
	a.extend(a.ui, {
		DateTimepicker: {
		}
	});
	a.datepicker._base_updateDatepicker = a.datepicker._updateDatepicker;
	a.datepicker._updateDatepicker = function (d)
	{
		a.datepicker._base_updateDatepicker(d);
		var e = d.input.val();
		if (d.input.hasClass("datetimepicker") == false)
		{
			return
		}
		var c = a(".ui-datepicker").append("<div class='.datetimepicker' />");
		c.append(html1);
		c.append(" H ");
		c.append(html2);
		c.append(" M ");
		c.append(html3);
		c.append(" S ");
		a.datetimepicker.setTime(e, d.input)
	};

	function b(d)
	{
		this.defaultDateTimePicker =
		{
			showTimePicker: false,
			time_format: "hh:mm:ss"
		};
		hourHTML = a("<select class='dateimepicker-hour' onchange='$.datetimepicker.isDirty = true;'></select>");
		minutsHTML = a("<select class='dateimepicker-minuts' onchange='$.datetimepicker.isDirty = true;'></select>");
		secondHTML = a("<select class='dateimepicker-second' onchange='$.datetimepicker.isDirty = true;'></select>");
		var c;
		for (i = 0; i < 24; i++)
		{
			if (i < 10)
			{
				c = "0" + i
			}
			else
			{
				c = i
			}
			html1 = hourHTML.append("<option>" + c + "</option")
		}
		for (i = 0; i < 60; i = i + 5)
		{
			if (i < 10)
			{
				c = "0" + i
			}
			else
			{
				c = i
			}
			html2 = minutsHTML.append("<option>" + c + "</option")
		}
		for (i = 0; i < 60; i = i + 5)
		{
			if (i < 10)
			{
				c = "0" + i
			}
			else
			{
				c = i
			}
			html3 = secondHTML.append("<option>" + c + "</option")
		}
	}
	a.fn.extend(
	{
		datetimepicker: function (c)
		{
			a.datetimepicker._attach(this, c)
		}
	});
	b.prototype =
	{
		_initTimePicker: function ()
		{
		},
		isDirty: false,
		innerOption: function (c)
		{
			return {
				showOn: "focus",
				buttonImage: "css/images/calendar.gif",
				buttonImageOnly: true,
				changeMonth: true,
				changeYear: true,
				autoSize: true,
				onSelect: function (g, d)
				{
					var e = a(".ui-datepicker .dateimepicker-hour").val();
					var h = a(".ui-datepicker .dateimepicker-minuts").val();
					var j = a(".ui-datepicker .dateimepicker-second").val();
					var f = e + ":" + h + ":" + j;
					c.val(c.val() + " " + f);
					a.datetimepicker.setTime(c.val(), c);
					a.datetimepicker.reset()
				},
				onClose: function (g, d)
				{
					if (a.datetimepicker.isDirty)
					{
						c.val(a.datepicker._formatDate(d));
						var e = a(".ui-datepicker .dateimepicker-hour").val();
						var h = a(".ui-datepicker .dateimepicker-minuts").val();
						var j = a(".ui-datepicker .dateimepicker-second").val();
						var f = e + ":" + h + ":" + j;
						c.val(c.val() + " " + f)
					}
				}
			}
		},
		_attach: function (d, c)
		{
			d.datepicker(a.fn.extend(this.innerOption(d), c)).addClass("datetimepicker");
			this.setTime(d.val(), d)
		},
		reset: function ()
		{
			this.isDirty = false
		},
		setTime: function (d, g)
		{
			var f = d.split(" ");
			var c = 0;
			var e = 0;
			var h = 0;
			if (f.length > 1)
			{
				var j = f[1];
				var k = j.split(":");
				if (k.length > 0)
				{
					c = k[0];
					if (k.length > 1)
					{
						e = k[1]
					}
					if (k.length > 2)
					{
						h = k[2]
					}
				}
			}
			a(".ui-datepicker .dateimepicker-hour").val(c);
			a(".ui-datepicker .dateimepicker-minuts").val(e);
			a(".ui-datepicker .dateimepicker-second").val(h)
		}
	};
	a.datetimepicker = new b();
	a.datetimepicker._initTimePicker()
}(jQuery));