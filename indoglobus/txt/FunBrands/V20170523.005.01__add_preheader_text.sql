DO
$BODY$
BEGIN

	-- add text column
  IF NOT EXISTS
  (
    SELECT column_name
    FROM information_schema.columns
    WHERE table_name='letter_config' and column_name='preheader_text'
  )
  THEN

	ALTER TABLE public.letter_config ADD preheader_text VARCHAR(250) DEFAULT 'Pump It Up.Where Every Day Is a Party' NULL;


  END IF;

  -- add int column
  IF NOT EXISTS
  (
    SELECT column_name
    FROM information_schema.columns
    WHERE table_name='waiver_templates' and column_name='type'
  )
  THEN

	ALTER TABLE public.waiver_templates ADD `type` INT DEFAULT '0' NULL;


  END IF;
  
  -- add row/data
  IF NOT EXISTS
	(
		SELECT type_name
		FROM notify_types
		WHERE type_name = 'Email Failed Delivery'
		LIMIT 1
	)
	THEN

      INSERT INTO notify_types (type_name, has_instant, has_daily, enabled, create_by, update_by, create_date, update_date)
VALUES ( 'Email Failed Delivery', 1, 0,  1,'mmaradia', 'mmaradia', now(), now());

	END IF;
END;
$BODY$;
